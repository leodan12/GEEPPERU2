@extends('layout.base')

@section('page-info')
 
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Editar Cotizacion
            </h1>
        </div>
        <div class="p-4">
            <div class="rounded border p-10">
                <Form method="POST" action="{{ url('cotizacion/update',$cotizacion->id) }}">
                    @csrf
                    <div class="row">
                     
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="fecha" class="required form-label">Fecha</label>
                            <input type="text" placeholder=" ingrese fecha" name="fecha" id="fecha" class="form-control" required readonly value="{{$cotizacion->fecha}}">
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="nombre" class="required form-label">Nombre</label>
                            <input type="text" placeholder=" ingrese nombre" name="nombre" id="nombre" class="form-control" required value="{{$cotizacion->nombre}}">
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="documento" class="required form-label">Documento</label>
                            <input type="text" placeholder=" ingrese documento" name="documento" id="documento" class="form-control" required value="{{$cotizacion->documento}}">
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="descuento" class="required form-label">Descuento</label>
                            <input type="number" step="0.01" placeholder=" ingrese descuento" name="descuento" id="descuento" class="form-control" required value="{{$cotizacion->descuento}}">
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="costototal" class="required form-label">Costo Total</label>
                            <input type="number" step=0.01 placeholder=" Ingrese Costo" name="costototal" id="costototal" class="form-control" required readonly value="{{$cotizacion->costototal}}">
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="estado" class="required form-label">Estado Cotizacion</label>
                            <select class="required form-select" name="estado" id="estado" readonly>
                                <option selected disabled>Seleccione un Estado</option>
                                <option value="COTIZADO" {{$cotizacion->estado=='COTIZADO' ? 'selected':''}}>COTIZADO</option>
                                <option value="ACEPTADA" {{$cotizacion->estado=='ACEPTADA' ? 'selected':''}}>ACEPTADA</option>
                                <option value="CANCELADA" {{$cotizacion->estado=='CANCELADA' ? 'selected':''}}>CANCELADA</option>
                                <option value="VENCIDA" {{$cotizacion->estado=='VENCIDA' ? 'selected':''}}>VENCIDA</option>

                            </select>
                        </div>
                        <h5>Agregar Detalle Cotizacion</h5>

                        <div class="col-sm-6 col-lg-3 mb-5">
                            <label for="producto_id" class="form-label" required>Producto</label>
                            <select class="  form-select" name="producto_id" id="producto_id">
                                <option selected disabled>Seleccione un producto</option>
                                @foreach($productos as $item)
                                <option value="{{$item->id}}" data-price="{{$item->price}}" data-name="{{$item->name}}">{{$item->name}}: S/{{$item->price}}</option>
                                @endforeach
                            </select>
                            
                        </div>

                        <div class="col-sm-6 col-lg-3 mb-5">
                            <label for="cantidad" class="form-label" required>Cantidad</label>
                            <input type="number" placeholder=" Ingrese Cantidad" name="cantidad" id="cantidad" class="form-control">
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-5">
                            <label for="preciototal" class="form-label" required>Precio Total</label>
                            <input type="number" step=0.1 placeholder=" Ingrese Precio Total" name="preciototal" id="preciototal" class="form-control" readonly>
                        </div>

                        @php $ind=0 ; @endphp
                        @php $indice=count($detallescotizaciones) ; @endphp
                        <div class="d-flex justify-content-end ">
                            <button type="button" class="btn btn-info" id="addDetalle" onclick="agregarFila('{{$indice}}')"><i class="fa fa-plus"></i> Agregar Detalle</button>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-row-bordered gy-5 gs-5" id="detalle">
                                <thead class="fw-bold text-primary">
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Producto</th>
                                        <th>Precio Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detallescotizaciones as $detalle)
                                    @php $ind++; @endphp
                                    <tr id="fila{{$ind}}">
                                        <td> {{$detalle->cantidad}}</td>
                                        <td> {{$detalle->name}}</td>
                                        <td> {{$detalle->preciototal}}</td>
                                        <td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila(  '{{$detalle->iddetallecotizacion}}','{{$ind}}'  )" data-id="0"><i class="bi bi-trash-fill"></i></button></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary" value="Guardar" id="Guardar">
                        <i class="far fa-check-circle"></i>
                        Aceptar
                    </button>
                    <a href="{{url('cotizacion/index')}}" type="button" class="btn btn-light">
                        <i class="fas fa-arrow-left"></i>
                        Cancelar
                    </a>
                </Form>
            </div>

        </div>
    </div>

</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script type="text/javascript">
    var costoventatotal = @json($cotizacion -> costototal);
    var estadocotizacion = @json($cotizacion -> estado);
    var preciototalI = 0;

    var preciounit = 0;
    //alert(costocotizaciontotal);
    $(document).ready(function() {
         

        document.getElementById("cantidad").onchange = function() {
            preciototal();
        };
        document.getElementById("descuento").onchange = function() {
            descuento();
        };
    });

    //funcion para agregar una fila
    var indice = 0;
    var pv = 0;

    function agregarFila(indice1) {

        if (pv == 0) {
            indice = indice1;
            pv++;
            indice++;
        } else {
            indice++;
        }

        //console.log(indice);
        //datos del detalleSensor
        var cantidad = $('[name="cantidad"]').val();
        var producto = $('[name="producto_id"]').val();
        var preciototal = $('[name="preciototal"]').val();
        var descuento = $('[name="descuento"]').val();

        //alertas para los detalles 
        if (!cantidad || cantidad == 0) {
            alert("ingrese una Cantidad");
            return;
        }
        if (!producto) {
            alert("Seleccione un producto");
            return;
        }
        if (!preciototal) {
            alert("ingrese una Precio Total");
            return;
        }


        var LDetalle = [];
        var tam = LDetalle.length;
        LDetalle.push(cantidad, producto, preciototal, nameprod);

        filaDetalle = '<tr id="fila' + indice +
            '"><td><input  type="hidden" name="Lcantidad[]" value="' + LDetalle[0] + '"required>' + LDetalle[0] +

            '</td><td><input  type="hidden" name="Lproducto[]" value="' + LDetalle[1] + '"required>' + LDetalle[3] +
            '</td><td ><input id="preciot' + indice + '"  type="hidden" name="Lpreciototal[]" value="' + LDetalle[2] + '"required>' + LDetalle[2] +
            '</td><td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila(' + indice + ')" data-id="0"><i class="bi bi-trash-fill"></i></button></td></tr>';

        $("#detalle>tbody").append(filaDetalle);

        indice++;
        costoventatotal = costoventatotal + preciototalI;
        preciototalI = 0;
        document.getElementById('costototal').value = costoventatotal.toFixed(2) - descuento;

        document.getElementById("cantidad").value = "";
        // document.getElementById("producto").value = "";
        document.getElementById("preciototal").value = "";

    }
    $("#producto_id").change(function() {

        $("#producto_id option:selected").each(function() {
            $price = $(this).data("price");
            $named = $(this).data("name");
            preciounit = $price;
            nameprod = $named;
            //alert(nameprod);
        });
    });

    //PARA ELIMINAR UN DATO DE LA TABLA
    function eliminarFila(idBD, ind) {

        Swal.fire({
            title: "¿Seguro que desea eliminar este registro?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonText: "Eliminar"
        }).then(function(result) {
            if (result.value) {
                var estado = document.getElementById("estado").value;
                if (estado == 'COTIZADO') {
                    $.get('/deletedetallecotizacion/' + idBD, function(data) {
                        $('#fila' + ind).remove();
                    });
                    toDelete = true;
                    icon = "success";
                    message = "El registro fue eliminado";
                } else {
                    toDelete = false;
                    icon = "error";
                    message = "El registro no se puede eliminar";
                }

                Swal.fire({
                    text: message,
                    icon: icon
                });

            }


        });
    }

    function quitarFila(ind) {
        Swal.fire({
            title: "¿Seguro que desea eliminar este registro?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonText: "Eliminar"
        }).then(function(result) {
            if (result.value) {
                var resta = 0;
                resta = $('[id="preciot' + ind + '"]').val();
                costoventatotal = costoventatotal - resta;
                $('#fila' + ind).remove();
                indice--;
                document.getElementById('costototal').value = costoventatotal;
                toDelete = true;
                icon = "success";
                message = "El registro fue eliminado";
                Swal.fire({
                    text: message,
                    icon: icon
                });
            }


        });
    }

    function preciototal() {
        preciototalI = 0;

        var cantidad = $('[name="cantidad"]').val();
        var producto = $('[name="producto_id"]').val();
        if (cantidad.length != 0 && producto_id.length != 0) {
            preciototalI = (cantidad * preciounit);
            document.getElementById('preciototal').value = preciototalI.toFixed(2);
        }
    }

    function descuento() {

        var descuento = $('[name="descuento"]').val();
        document.getElementById('costototal').value = costoventatotal - descuento;

    }
</script>
@endsection