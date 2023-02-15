@extends('layout.basemant')
 
@section('page-info')


 
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<!-- mostramos el mensaje despues de hacer un cambio en los resgistros-->
<script src="{{ asset('mensaje.js') }}"> </script>

@endsection
@section('content')
<br>
<div class="row">
    <div class="col col-12">
        <h5>Listado de Cotizaciones</h5>
        @if (session()->has('respuesta')) {{-- comprueba si existe el valor en sesión --}}
        <script>
            mensaje("{{session('respuesta')}}");
        </script>

        {!! session()->forget('respuesta') !!} {{-- borrar el error de sesión --}}
        @endif
       
    </div>
</div>
<div  >
    <div class="row">
        
        <div class="d-flex justify-content-end mb-5" data-kt-docs-table-toolbar="base">
            <a href="{{url('cotizacion/create')}}" class="btn btn-primary">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
                    </svg>
                </span>
                Crear
            </a>
        </div>
        
        
        <br><br><br>

        <div class="table-responsive">
            <div class="d-flex flex-stack">
                <div class="d-flex btn-excel-datatable"></div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" id="buscador" class="form-control form-control-solid w-250px ps-15" autocomplete="off" placeholder="Buscar en el listado" />
                    </div>

                </div>
            </div>
            <table id="listado" data-page-length='5' class="table table-row-bordered table-row-success table-rounded border gs-7 align-middle" style="width: 92,5vw;">
                <thead>
                    <tr class=" text-primary fw-bold fs-6" id="fila">
                        <th class="w-80px">Id</th>
                        <th class="w-80px">Fecha</th>
                        <th class="w-80px">Nombres Cliente</th>
                        <th class="w-80px">Documento</th>
                        <th class="w-80px">Descuento</th> 
                        <th class="w-80px">Costo Cotizacion</th>
                        <th class="w-80px">Estado Cotizacion</th> 

                        <th class="w-80px">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

        <div class="modal fade modal-lg" id="mimodal" tabindex="-1" aria-labelledby="mimodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="mimodalLabel">Ver Cotizacion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="Nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control " id="verNombre" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="Marca" class="col-form-label">Marca:</label>
                                    <input type="text" class="form-control" id="verMarca" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="Precio" class="col-form-label">Precio:</label>
                                    <input type="text" class="form-control" id="verPrecio" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="Stock" class="col-form-label">Stock:</label>
                                    <input type="text" class="form-control" id="verStock" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="Oferta" class="col-form-label">Oferta:</label>
                                    <input type="text" class="form-control" id="verOferta" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="PorcentajeDescuento" class="col-form-label">Porcentaje Descuento:</label>
                                    <input type="text" class="form-control" id="verDescuento" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="costoCotizacion" class="col-form-label">Imagen:</label>
                                    <img src="" alt="imagen" id="verImagen"> 
                                </div>
                                
                                 
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-row-bordered gy-5 gs-5" id="detallecotizacion">
                                <thead class="fw-bold text-primary">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th> 
                                        <th>Precio Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="generarcotizacion"><i class="fa-regular fa-file-pdf"></i>&nbsp; Generar Cotizacion  </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div>
        <section>

            <div id="pagination"></div>
        </section>
    </div>
    <br>
    <br>
</div>
@endsection


@section('script')
@include('helpers.data-managment')
<script>
    idcotizacion = 0;
    const mimodal = document.getElementById('mimodal')
    mimodal.addEventListener('show.bs.modal', event => {

        const button = event.relatedTarget
        const id = button.getAttribute('data-id')
        var urlcotizacion = "{{ url('productos/show') }}";
        $.get(urlcotizacion + '/' + id, function(data) {
            //console.log(data);
            const modalTitle = mimodal.querySelector('.modal-title')
            modalTitle.textContent = `Ver Registro ${id}`;
            idcotizacion = id;
            document.getElementById("verNombre").value = data[0][0].name;
            document.getElementById("verNombres").value = data[0].nombre;
            document.getElementById("verDocumento").value = data[0].documento;
            document.getElementById("verDescuento").value = data[0].descuento;
            document.getElementById("verCostoCotizacion").value = data[0].costototal;
            document.getElementById("verEstadoCotizacion").value = data[0].estado;

            document.getElementById('verImagen').style.width = '100%';  
            document.getElementById('verImagen').height = 250; 
            document.getElementById("verNombre").value = data[0].nombre;
            document.getElementById('verImagen').src = '/principal/'+data[0].imagen;
            

            var tabla = document.getElementById(detallecotizacion);
            $('#detallecotizacion tbody tr').slice().remove();
            for (var i = 0; i < data.length; i++) {
                filaDetalle = '<tr id="fila' + i +
                    '"><td><input  type="hidden" name="Lname[]" value="' + data[i].name + '"required>' + data[i].name +

                    '</td><td><input  type="hidden" name="Lcantidad[]" value="' + data[i].cantidad + '"required>' + data[i].cantidad +
                    '</td><td><input  type="hidden" name="Lprice[]" value="' + data[i].price + '"required>' + data[i].price + 
                    '</td><td><input  type="hidden" name="Lpreciototal[]" value="' + data[i].preciototal + '"required>' + data[i].preciototal +
                    '</td></tr>';

                $("#detallecotizacion>tbody").append(filaDetalle);
            }

        });

    })


    var cotizaciones = @json($cotizaciones);
    var urlcotizaciones = "{{ url('cotizacion') }}";


    var table = defineTable($('#listado'), [], [0, 1, 2, 3, 4, 5, 6, ], 'cotizaciones', function() {}, true, true, false);

    $('#buscador').keyup(function(e) {
        table.search(e.target.value).draw();
    });
    var viewbtn = true;
    var editbtn = true;
    var deletetn = true;

     
    listarOnTable(table, cotizaciones, 0, [], viewbtn, editbtn, deletetn, urlcotizaciones, false, []);

    $("select[name=selectestado]").change(function(e){
        table.search(e.target.value).draw();
        });

        
    $('#generarcotizacion').click(function() {

        //window.open( '/generarcotizacionpdf/' + idcotizacion );
        generarcotizacion(idcotizacion);
    });

   
   function generarcotizacion($id){
    if($id != -1){
    window.open( '/generarcotizacionpdf/' + $id );}

   }     
</script>


@endsection