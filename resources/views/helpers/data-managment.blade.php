<script>
	var lastPage = 0;
	var id = 0;
	var info = "";
	var openingByFather = false;

	function defineTable(tabla = $('#tableManagment'), centerColumns = [], columnsExport = [], titleExport = '', fnCreatedRow = function() {}, hasExcel = true,
		ordering = true, refresh = false, btnT = $('#btn'), excelFunction = function(data, row, column, node) {
			return data[0];
		}, hasPDF = true, pagination = true) {
		var btnString = 'excel';
		if (hasPDF)
			btnString += ', pdf';
		var table = tabla.DataTable({
			lengthMenu: [25, 50, 75, 100],
			paging: pagination,
			order: [],
			ordering: ordering,
			columnDefs: [{
					"className": 'dt-center',
					"targets": centerColumns
				},
				{
					"className": 'fs-7',
					targets: '_all',
				}
			],
			createdRow: fnCreatedRow,
			buttons: [{
					extend: 'excelHtml5',
					title: titleExport,
					exportOptions: {
						columns: (columnsExport.length == 0 ? ':visible' : columnsExport),
						format: {
							body: excelFunction
						}
					}
				},
				(hasPDF ? {
					extend: 'pdfHtml5',
					title: titleExport,
					 
					pageSize: 'A4'
				} : undefined)
			],
		});

		tabla.on('page.dt', function() {
			info = table.page.info();
			lastPage = info.page;
			$(function() {
				$('[data-bs-toggle="tooltip"]').tooltip();
				$("[data-bs-toggle=popover]").popover({
					html: true,
				});
			});
		});
		tabla.on('click', '.viewt', function() {
			$(this).parents('tr').find('.view').trigger('click')
		});
		tabla.on('click', '.delete', function() {
			var row = table.row($(this).parents('tr'));
			var url = $(this).data('url');
			var id = $(this).data('id');
			var ruta = url + '/' + id + '/delete';

			if (id == 0) {
				row.remove().draw();
				table.page(lastPage).draw('page');
			} else {
				Swal.fire({
					title: "¿Seguro que desea eliminar este registro?",
					icon: "warning",
					showCancelButton: true,
					cancelButtonText: "Cancelar",
					confirmButtonText: "Eliminar"
				}).then(function(result) {
					if (result.value) {
						getModelByParams({}, ruta, "get", function(response) {
							toDelete = true;
							icon = "success";
							message = "El registro fue eliminado";
							if (response) {
								toDelete = false;
								icon = "error";
								if (response.exito == 1) {
									toDelete = true;
									icon = "success";
								}
								message = response.message;
							}
							Swal.fire({
								text: message,
								icon: icon
							});
							if (refresh)
								btnT.trigger('click');
							else
							if (toDelete)
								row.remove().draw();

							table.page(lastPage).draw('page');
						});
					}
				});
			}
		});

		if (hasExcel)
			createButtons(table);

		return table;
	}

	function createButtons(tabla) {
		tabla.buttons().container().appendTo($(tabla.table().container()).parents('.table-responsive').find('.btn-excel-datatable'));
		$('.buttons-excel').html('<i class="far fa-file-excel fs-3"></i> Descargar')
		$('.buttons-excel').removeClass('btn-secondary');
		$('.buttons-excel').addClass('btn-success');
		$('.buttons-pdf').html('<i class="far fa-file-pdf fs-3"></i> Descargar')
		$('.buttons-pdf').removeClass('btn-secondary');
		$('.buttons-pdf').addClass('btn-danger');
		$('.buttons-pdf').css('margin-left', '10px');
	}

	/**
	 * @parmam/@data, data
	 * @route, route attack
	 * @attempt GET OR POST
	 */

	function getModelByParams(params_, route, method_, callback, paramsFunction = []) {
		try {
			$('.loading').show();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});

			$.ajax({
				url: route,
				method: method_,
				data: params_,
				success: function(response) {
					try {
						data = response.data;
						paramsFunction.push(data);
						callback.apply(this, paramsFunction);
					} catch (e) {
						Swal.fire({
							text: e,
							icon: "error"
						});
						console.log(e);
					} finally {
						if (!openingByFather)
							$('.loading').hide();
					}

				},
				error: function(request, status, message) {
					Swal.fire({
						text: "Error en la peticion de datos: Error " + status + '-' + message,
						icon: "error"
					});
					console.log(message);
					$('.loading').hide();
				}
			});
		} catch (e) {
			Swal.fire({
				text: e,
				icon: "error"
			});
			console.log(e);
			$('.loading').hide();
		}
	}

	function saveModel(data, route, method_, callback, paramsFunction = []) {
		try {
			$('.loading').show();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});

			$.ajax({
				url: route,
				method: method_,
				data: data,
				success: function(response) {
					try {
						paramsFunction.push(response);
						callback.apply(this, paramsFunction);
					} catch (e) {
						Swal.fire({
							text: e,
							icon: "error"
						});
						console.log(e);
					} finally {
						$('.loading').hide();
					}

				},
				error: function(request, status, message) {
					Swal.fire({
						text: "Error en la peticion de datos: Error " + status + '-' + message,
						icon: "error"
					});
					console.log(e);
					$('.loading').hide();
				}
			});
		} catch (e) {
			Swal.fire({
				text: e,
				icon: "error"
			});
			console.log(e);
			$('.loading').hide();
		}

		return status;
	}

	function ObjectToArray(obj) {
		var result = Object.keys(obj).map(function(key) {
			// Using Number() to convert key to number type
			// Using obj[key] to retrieve key value
			return [obj[key]];
		});
		return result;
	}

	/**
	 * @data is a collections of collection of items
	 * @table is a DataTable
	 ** @data, they would be ordered like wanna show as columns header.
	 **
	 */

	

	function listarOnTable(table, data = [], columnID = 0, columnsToHide = [], hasBtnView , hasBtnEdit , hasBtnDelete , url = "", hasChk = false, personalButtons = [], hideEdit = false) {
		table.clear().draw();
		var row = [];
		for (var i = 0; i < data.length; i++) {
			row = ObjectToArray(data[i]);
			 
			var extraButtons = "";
			if (personalButtons.length > 0) {
				for (let x = 0; x < personalButtons.length; x++) {
					const btn = personalButtons[x];
					if (btn.attr('data-type') == 'link') {
						action = btn.attr('data-action');
						btn.attr('href', url + '/' + row[columnID] + '/' + action);
					}
					if (btn.attr('data-type') == 'button') {
						btn.attr('data-id', row[columnID]);
					}
					if (btn.find('i').attr('data-type') == 'button') {
						btn.find('i').attr('data-id', row[columnID]);
					}
					extraButtons += btn.prop('outerHTML');
				}
			}
 
			if (hasBtnView) {
				extraButtons += '<button type="button" class="btn btn-link btn-color-info btn-sm viewt" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver"><i class="bi bi-eye-fill"></i></button>' +
					'<button type="button" style="display: none" class="view" data-bs-toggle="modal" data-bs-target="#mimodal" id="verregistro"  data-id="' + row[columnID] + '"></button>';
			 
			}
			if (hasBtnEdit) {
					extraButtons += '<a href="' + url + '/' + row[columnID] + '/edit" class="btn btn-link btn-color-warning btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="bi bi-pencil-fill"></i></a>';
			}	
			if (hasBtnDelete) {	 
				extraButtons += '<button type="button" class="btn btn-link btn-color-danger btn-sm delete" data-url="' + url + '" data-id="' + row[columnID] + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"><i class="bi bi-trash-fill"></i></button>';
					}
			row.push(extraButtons);


			if (hasChk) {
				row.unshift('<input type="checkbox" class=".chk" data-id="' + row[columnID] + '" />');
			}

			auxColumnsToHide = []
			for (let i = 0; i < columnsToHide.length; i++) {
				auxColumnsToHide.push(columnsToHide[i]);
			}
			for (var j = 0; j < auxColumnsToHide.length; j++) {
				row.splice(auxColumnsToHide[j], 1);
				if ((j + 1) < auxColumnsToHide.length) {
					for (var h = (j + 1); h < auxColumnsToHide.length; h++) {
						auxColumnsToHide[h] = auxColumnsToHide[h] - 1
					}
				}
			}
			table.row.add(row);
		}
		table.draw();
		table.page.info();
		table.page(lastPage).draw('page');
		$(function() {
			$('[data-bs-toggle="tooltip"]').tooltip();
			$("[data-bs-toggle=popover]").popover({
				html: true,
			});
		});
	}

	function listarOnSelect(select, data = [], columnID = 0, columnPrincipalName = 1) {
		select.html('<option></option>');
		for (var i = 0; i < data.length; i++) {
			var array = ObjectToArray(data[i]);
			select.append('<option value="' + array[columnID] + '">' + array[columnPrincipalName] + '</option>');
		}
		select.change();
	}

	$('#delete').on('shown.bs.modal', function() {
		$('#txtIdE').val(id);
	})

	$('#delete, #new').on('hide.bs.modal', function() {
		id = 0;
		$('#new').parent().trigger('reset');
		$('#delete').parent().trigger('reset');
	});
</script>