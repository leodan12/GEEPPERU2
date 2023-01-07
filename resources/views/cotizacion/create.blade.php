@extends('layout.base')
@section('page-info')
 

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="p-1">
            <h1 class="anchor fw-bolder">
                Nueva Cotizacion
            </h1>
        </div>
        <Form method="POST" action="{{ url('cotizacion/store') }}">
            @csrf
            <div class="form-group">
                <div class="row">

                <div class="col-md-12 col-lg-12 mb-5">
                        <label for="nombre" class="required form-label"   >Nombres</label>
                        <input type="text" placeholder=" ingrese nombre" name="nombre" id="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-5">
                        <label for="fecha" class="required form-label"   >Fecha</label>
                        <input type="date" placeholder=" ingrese fecha" name="fecha" id="fecha" class="form-control" required>
                    </div>
                   
                    <div class="col-md-6 col-lg-3 mb-5">
                        <label for="documento" class="required form-label"  >Documento</label>
                        <input type="text" placeholder=" ingrese documento" name="documento" id="documento" class="form-control" required>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5">
                        <label for="descuento" class="required form-label" >Descuento</label>
                        <input type="number" step="0.01" placeholder=" ingrese descuento" name="descuento" id="descuento" class="form-control" required>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5">
                        <label for="costototal" class="required form-label"  >Costo Total</label>
                        <input type="number" step="0.01" readonly placeholder=" ingrese costo total" name="costototal" id="costototal" class="form-control" required>
                    </div>
                    
                    

                    <hr>

                    <h5>Agregar Productos</h5>

                    
                    <div class="col-md-6 col-lg-4 mb-5">
                            <label for="producto_id" class="  form-label">Producto </label>
                            <select class="form-select" name="producto_id" id="producto_id" >
                            <option selected disabled>Seleccione un  Producto</option>
                            @foreach($productos as $item)
                            <option value="{{$item->id}}" data-price="{{$item->price}}" data-name="{{$item->name}}">{{$item->name}}: S/{{$item->price}}</option>
                            @endforeach
                        </select>
                        </div>

                    <div class="col-md-6 col-lg-4 mb-5">
                        <label for="cantidad" class="  form-label"  >Cantidad</label>
                        <input type="number" placeholder=" Ingrese Cantidad" name="cantidad" id="cantidad" class="form-control">
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <label for="preciototal" class="  form-label"  >Precio Total</label>
                        <input type="number" step="0.01" readonly placeholder=" Ingrese Precio Total" name="preciototal" id="preciototal" class="form-control">
                    </div>
                     

                    <div class="d-flex justify-content-end ">
                        <button type="button" class="btn btn-info" id="addDetalle"><i class="fa fa-plus"></i> Agregar Respuesta</button>
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
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style="text-align: center">
                    <div class="col-12">
                        <button type="submit" value="Guardar" id="Guardar" class="btn btn-primary"><i class="fas fa-save"> </i>&nbsp;Guardar Cotizacion</button>
                        <a href="{{url('cotizacion/index')}}" type="button" class="btn btn-light">
                            <i class="fas fa-arrow-left"></i>
                            Cancelar
                        </a>
                    </div>

                </div>
            </div>

        </Form>

        <!--end::Wrapper-->

    </div>

</div>
<br>


@endsection




@section('script')
@include('helpers.data-managment')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
   var preciototalI=0;
   var costoventatotal = 0;
   var indice = 0;
   var preciounit = 0;
   var nameprod = 0;
    $(document).ready(function() {
       
        var hoy = new Date();  
        var fechaActual = hoy.getFullYear() + '-' + (String(hoy.getMonth() + 1).padStart(2, '0')) + '-' + String(hoy.getDate()).padStart(2, '0');
        document.getElementById("fecha").value = fechaActual;
         
        document.getElementById("cantidad").onchange = function() {
        preciototal();
        };
        document.getElementById("descuento").onchange = function() {
        descuento();
        };
 
        //PARA AGREGAR DETALLES DE BATCH A LA TABLA
        var tabla = document.getElementById(detalle);
       
        $('#addDetalle').click(function() {
          
            //datos del detalle
          
            var cantidad = $('[name="cantidad"]').val();
            var producto = $('[name="producto_id"]').val();
            var preciototal = $('[name="preciototal"]').val();
            var descuento = $('[name="descuento"]').val();
             
            //alertas para los detalles 
            if (!cantidad || cantidad ==0) {  alert("ingrese una Cantidad"); return;   }
            if (!producto) {  alert("Seleccione un producto"); return;   }
            if (!preciototal) {  alert("ingrese una Precio Total"); return;   }
           
             
            var LDetalle = [];
            var tam = LDetalle.length;
            LDetalle.push(cantidad,producto, preciototal,nameprod );
        
                filaDetalle ='<tr id="fila' + indice + 
                '"><td><input  type="hidden" name="Lcantidad[]" value="' + LDetalle[0]  + '"required>'+ LDetalle[0]+
               
                '</td><td><input  type="hidden" name="Lproducto[]" value="' + LDetalle[1] + '"required>'+ LDetalle[3]+ 
                '</td><td ><input id="preciot' + indice +'"  type="hidden" name="Lpreciototal[]" value="' + LDetalle[2] + '"required>'+ LDetalle[2]+ 
                '</td><td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila(' + indice + ')" data-id="0"><i class="bi bi-trash-fill"></i></button></td></tr>';
               
                $("#detalle>tbody").append(filaDetalle);
               
                 indice++;
                 costoventatotal = costoventatotal + preciototalI;
                 preciototalI=0;
                 document.getElementById('costototal').value = costoventatotal.toFixed(2)-descuento;
                 
                 document.getElementById("cantidad").value = "";
                // document.getElementById("producto").value = "";
                 document.getElementById("preciototal").value = "";
 
        });

        $("#producto_id").change(function () {
       
            $("#producto_id option:selected").each(function () { 
                $price = $(this).data("price");
                $named = $(this).data("name");
                preciounit = $price;
                nameprod = $named;
                //alert(nameprod);
        });  });
    


        $('#Guardar').click(function() {
            
            var fecha = $('[name="fecha"]').val();
             
            var costototal = $('[name="costototal"]').val();
            var nombre = $('[name="nombre"]').val();
            var documento = $('[name="documento"]').val();
            var descuento = $('[name="descuento"]').val();
           
            if (!fecha) {  alert("Ingrese una fecha"); return;   }
            if (!descuento) {  alert("Ingrese un descuento"); return;   }
            if (!costototal) {  alert("Ingrese un costo total");    return;  }
            if (!nombre) {  alert("Ingrese un nombre"); return;   }
            if (!documento) {  alert("Ingrese un documento");    return;  }

            confirm('Guardar ?');
        });




    });
    //PARA ELIMINAR UN DATO DE LA TABLA
    function eliminarFila(ind) {
        var resta =0;
        resta = $('[id="preciot' + ind+'"]').val();
          //alert(resta);
        costoventatotal = costoventatotal - resta;

    $('#fila' + ind).remove();
        indice-- ;
    // damos el valor
    document.getElementById('costototal').value = costoventatotal;
    //alert(resta);

    return false;
}

       

    

    function preciototal() {
         preciototalI=0;
         
        var cantidad = $('[name="cantidad"]').val(); 
        var producto = $('[name="producto_id"]').val();
        if(cantidad.length != 0  && producto_id.length != 0){
             
                    
                    preciototalI = (cantidad * preciounit) ;
                    
                    document.getElementById('preciototal').value = preciototalI.toFixed(2);
                  
                
        }
   }

   function descuento(){
    
    var descuento = $('[name="descuento"]').val();    
    document.getElementById('costototal').value = costoventatotal-descuento;
        
   }

</script>
@endsection