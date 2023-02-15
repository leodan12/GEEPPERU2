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
        <h5>Listado de Productos</h5>
        @if (session()->has('respuesta')) {{-- comprueba si existe el valor en sesión --}}
    <script>
       
       mensaje("{{session('respuesta')}}");
   </script>

    {!! session()->forget('respuesta') !!} {{-- borrar el error de sesión --}}
    @endif
    </div>
</div>
<div class="">
    <div class="row">
        <div class="d-flex justify-content-end mb-5" data-kt-docs-table-toolbar="base">
            <a href="{{url('productos/create')}}" class="btn btn-primary">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
                    </svg>
                </span>
                Crear
            </a>

        </div>
        <!-- 
        <button type="button" class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#mimodal" data-bs-whatever="@fat">Open modal for @fat</button>
-->

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
                        <th class="w-80px">Nombre</th>
                        <th class="w-80px">Marca</th>
                        <th class="w-80px">Precio</th>
                        <th class="w-80px">Descripcion</th>
                        <th class="w-80px">Stock</th>
                        <th class="w-80px">Oferta</th>
                        <th class="w-80px">Porcentaje Descuento</th>
                        <th class="w-80px">Imagen Principal</th>
                        
                        <th class="w-80px">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

        <div class="modal fade" id="mimodal" tabindex="-1" aria-labelledby="mimodal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="mimodalLabel">Ver Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-8 col-lg-9 mb-5">
                                    <label for="Nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control " id="verNombre" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-3 mb-5">
                                    <label for="Marca" class="col-form-label">Marca:</label>
                                    <input type="text" class="form-control" id="verMarca" readonly>
                                </div>
                                <div class="col-sm-3 col-lg-3 mb-5">
                                    <label for="Precio" class="col-form-label">Precio:</label>
                                    <input type="text" class="form-control" id="verPrecio" readonly>
                                </div>
                                <div class="col-sm-3 col-lg-3 mb-5">
                                    <label for="Stock" class="col-form-label">Stock:</label>
                                    <input type="text" class="form-control" id="verStock" readonly>
                                </div>
                                <div class="col-sm-3 col-lg-3 mb-5">
                                    <label for="Oferta" class="col-form-label">Oferta:</label>
                                    <input type="text" class="form-control" id="verOferta" readonly>
                                </div>
                                <div class="col-sm-3 col-lg-3 mb-5">
                                    <label for="PorcentajeDescuento" class="col-form-label">Porcentaje Descuento:</label>
                                    <input type="text" class="form-control" id="verDescuento" readonly>
                                </div>
                                <div class="col-sm-4 col-lg-4 mb-5">
                                    <label for="costoCotizacion" class="col-form-label">Imagen:</label>
                                    <img src="" alt="imagen" id="verImagen"> 
                                </div>
                                
                                 
                            </div>
                        </form>
                        <div class="row">
                        <div class="col-sm-4 col-lg-4 mb-5" style="border: 1px solid gray; border-radius: 5px;">
                        <div class="table-responsive">
                            <table class="table table-row-bordered gy-5 gs-5" id="verSubcategorias">
                                <thead class="fw-bold text-primary">
                                    <tr>
                                        <th>Subcategoria</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>      
                        </div>
                        <div class="col-sm-8 col-lg-8 mb-5" style="border: 1px solid gray; border-radius: 5px;">
                        <div class="table-responsive">
                            <table class="table table-row-bordered gy-5 gs-5" id="verEspecificaciones">
                                <thead class="fw-bold text-primary">
                                    <tr>
                                        <th>Especificacion</th> 
                                        <th>Dato</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>   
                        </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
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
    const mimodal = document.getElementById('mimodal')
    mimodal.addEventListener('show.bs.modal', event => {

        const button = event.relatedTarget
        const id = button.getAttribute('data-id')
        var urlproducto = "{{ url('productos/show') }}";
        $.get(urlproducto + '/' + id, function(data) {
            console.log(data);

           
            const modalTitle = mimodal.querySelector('.modal-title')
            modalTitle.textContent = `Ver Registro ${id}` 
            document.getElementById("verNombre").value=data['producto'][0].name;
            document.getElementById("verMarca").value=data['producto'][0].marca;  
            document.getElementById("verPrecio").value=data['producto'][0].price;
            document.getElementById("verStock").value=data['producto'][0].stock;
            document.getElementById("verOferta").value=data['producto'][0].oferta;
            document.getElementById("verDescuento").value=data['producto'][0].porcentajedescuento;
            

            document.getElementById('verImagen').style.width = '100%';  
            document.getElementById('verImagen').height = 100; 
            document.getElementById('verImagen').src = '/images/'+data['producto'][0].image_path;

            var tabla1 = document.getElementById(verSubcategorias);
            $('#verSubcategorias tbody tr').slice().remove();
            for (var i = 0; i < data['subcategorias'].length; i++) {
                filaDetalle1 = '<tr id="fila1' + i +
                    '"><td><input  type="hidden" name="Lsubcat[]" value="' + data['subcategorias'][i].nombre + '"required>' + data['subcategorias'][i].nombre +
                    '</td> </tr>';

                $("#verSubcategorias>tbody").append(filaDetalle1);
            }

            var tabla2 = document.getElementById(verEspecificaciones);
            $('#verEspecificaciones tbody tr').slice().remove();
            for (var j = 0; j < data['especificaciones'].length; j++) {
                filaDetalle2 = '<tr id="fila1' + i +
                    '"><td><input  type="hidden" name="LDetEsp[]" value="' + data['especificaciones'][j].especificacion + '"required>' + data['especificaciones'][j].especificacion +
                    ' </td><td><input  type="hidden" name="LDetDato[]" value="' + data['especificaciones'][j].dato + '"required>' + data['especificaciones'][j].dato +
                    '</td> </tr>';

                $("#verEspecificaciones>tbody").append(filaDetalle2);
            }

        });
    })

    var productos = @json($productos);
    var urlProductos = "{{ url('productos') }}";


    var table = defineTable($('#listado'), [], [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, ], 'Productos', function() {}, true, true, false);

    $('#buscador').keyup(function(e) {
        table.search(e.target.value).draw();
    });
    var viewbtn = true ;
    var editbtn = true ;
    var deletetn = true ;
 
    
    

    listarOnTable(table, productos, 0, [], viewbtn, editbtn, deletetn, urlProductos, false, []);

   

</script>


@endsection