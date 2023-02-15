@extends('layout.basemant')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Nuevo Producto
            </h1>
        </div>
        <div class="p-4">
            <div class="rounded border p-10">
                <Form method="POST" action="{{ url('productos/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="name" class="required form-label">Nombre</label>
                            <input type="text" placeholder=" ingrese Nombre" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="marca" class="required form-label">Marca</label>
                            <input type="text" placeholder=" ingrese Marca" name="marca" id="marca" class="form-control" required>
                        </div>

                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="precio" class="required form-label">Precio</label>
                            <input type="number" step=0.1 placeholder=" Ingrese precio" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="stock" class="required form-label">Stock</label>
                            <input type="number" step=1 min=0 placeholder=" Ingrese Stock" name="stock" id="stock" class="form-control" required>
                        </div>

                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="oferta" class="required form-label">Oferta</label>
                            <select class="required form-select" name="oferta" id="oferta">
                                <option selected disabled>Seleccione una sub categoria</option>
                                <option value="1"> SI </option>
                                <option value="0"> NO </option>
                            </select>
                        </div>

                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="porcetajedescuento" class="required form-label">Porcentaje Descuento</label>
                            <input type="number" step=1 min=0 max=100 placeholder=" ingrese porcetaje descuento" name="porcetajedescuento" id="porcetajedescuento" class="form-control" required>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5">
                            <label for="fecha" class="required form-label">Seleccione una Imagen Principal</label>
                            <input type="file" id="imagen" name="imagen" accept=".jpg,.jpeg,.png,.webp" class="form-control" required>
                        </div>
                        <div class="col-sm-6 col-lg-8 mb-5">
                            <label for="descripcion" class="required form-label">Descripcion </label>
                            <input type="text" placeholder=" Ingrese descripcion" name="descripcion" id="descripcion" class="form-control" required>
                        </div>
                        

                        <hr>

                        <h5>Agregar Subcategorias Y Especificaciones</h5>

                        
                        <!-- para las subcategorias -->
                        <div class="col-sm-12 col-lg-4 mb-5" style="border: 1px solid gray; border-radius: 5px;">
                        <br><br>
                        <div class="col-sm-12 col-lg-12 mb-5">
                            <label for="subcategoria" class="required form-label">Sub Categoria </label>
                            <select class="required form-select" name="subcategoria" id="subcategoria">
                                <option selected disabled>Seleccione una sub categoria</option>
                                @foreach($subcategorias as $item)
                                <option value="{{$item->id}}" data-name="{{$item->subcategoria}}">{{$item->subcategoria}} - {{$item->categoria}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end ">
                            <button type="button" class="btn btn-info" id="addDetalleSubcategorias"><i class="fa fa-plus"></i> Agregar Sub Categoria</button>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-row-bordered gy-5 gs-5" id="subcategorias">
                                <thead class="fw-bold text-primary">
                                    <tr>
                                        <th>Sub Categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>


                        </div>
                        <!-- para las especificaciones -->
                        <div class="col-sm-12 col-lg-8 mb-5" style="border: 1px solid gray; border-radius: 5px;">
                        <br><br>
                        <div class="row">
                        <div class="col-sm-12 col-lg-6 mb-5">
                            <label for="especificacion" class="required form-label">Especificaciones </label>
                            <select class="required form-select" name="especificacion" id="especificacion">
                                <option selected disabled>Seleccione una Especificacion</option>
                                @foreach($especificaciones as $item)
                                <option value="{{$item->id}}" data-name="{{$item->especificacion}}">{{$item->especificacion}} - {{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-lg-6 mb-5">
                            <label for="dato" class="required form-label">Datos</label>
                            <input type="text" placeholder=" Ingrese Dato" name="dato" id="dato" class="form-control" >
                        </div>
                        </div>

                        <div class="d-flex justify-content-end ">
                            <button type="button" class="btn btn-info" id="addDetalleEspecificaciones"><i class="fa fa-plus"></i> Agregar Especificacion</button>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-row-bordered gy-5 gs-5" id="especificaciones">
                                <thead class="fw-bold text-primary">
                                    <tr>
                                        <th>Especificacion</th>
                                        <th>Dato</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>



                        </div>

                          

                    </div>


                    <button type="submit" class="btn btn-primary">
                        <i class="far fa-check-circle"></i>
                        Aceptar
                    </button>
                    <a href="{{url('productos/index')}}" type="button" class="btn btn-light">
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
@include('helpers.data-managment')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    
    var indice1 = 0;
    var indice2 = 0;
    var namesubcat = 0;
    var nameespecificacion = 0;
    $(document).ready(function() { 
        //PARA AGREGAR DETALLES DE BATCH A LA TABLA
        var tablasubcategorias = document.getElementById(subcategorias);
        var tablaespecificaciones = document.getElementById(especificaciones);

        $('#addDetalleSubcategorias').click(function() {
          //datos del detalleSensor
            var subcategoria = $('[name="subcategoria"]').val(); 
            //alertas para los  
            if (!subcategoria) {
                alert("ingrese una subcategoria");
                return;
            } 
            var LDProductoSub = [];
            var tam = LDProductoSub.length;
            LDProductoSub.push(subcategoria,namesubcat); 
            filaDetalle1 = '<tr id="fila1' + indice1 +
                '"><td><input  type="hidden" name="Lsubcategorias[]" value="' + LDProductoSub[0] + '"required>' + LDProductoSub[1] + 
                '</td><td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila1(' + indice1 + ')" data-id="0"><i class="bi bi-trash-fill"></i></button></td></tr>';
            $("#subcategorias>tbody").append(filaDetalle1);
            indice1++;
          
            document.getElementById("subcategoria").value = "";

        });

        $('#addDetalleEspecificaciones').click(function() {
          //datos del detalleSensor
            var especificacion = $('[name="especificacion"]').val(); 
            var dato = $('[name="dato"]').val(); 
            //alertas para los  
            if (!especificacion) {
                alert("ingrese una especificacion");
                return;
            } 
            if (!dato) {
                alert("ingrese un dato");
                return;
            } 
            var LDProductoEsp = [];
            var tam = LDProductoEsp.length;
            LDProductoEsp.push(especificacion,nameespecificacion,dato); 
            filaDetalle2 = '<tr id="fila2' + indice2 +
                '"><td><input  type="hidden" name="Lespecificaciones[]" value="' + LDProductoEsp[0] + '"required>' + LDProductoEsp[1] + 
                '</td><td><input  type="hidden" name="Ldatos[]" value="' + LDProductoEsp[2] + '"required>' + LDProductoEsp[2] + 
                '</td><td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila2(' + indice2 + ')" data-id="0"><i class="bi bi-trash-fill"></i></button></td></tr>';
            $("#especificaciones>tbody").append(filaDetalle2);
            indice2++;
          
            document.getElementById("especificacion").value = "";
            document.getElementById("dato").value = "";
        });

        $("#subcategoria").change(function () { 
       $("#subcategoria option:selected").each(function () {  
           $named = $(this).data("name");
           namesubcat = $named;
   });  });
   $("#especificacion").change(function () { 
       $("#especificacion option:selected").each(function () {  
           $named = $(this).data("name");
           nameespecificacion = $named;
   });  }); 

        $('#Guardar').click(function() {

            var name = $('[name="name"]').val();
            var marca = $('[name="marca"]').val();
            var price = $('[name="price"]').val();
            var stock = $('[name="stock"]').val();
            var oferta = $('[name="oferta"]').val();
            var porcetajedescuento = $('[name="porcetajedescuento"]').val();
            var descripcion = $('[name="descripcion"]').val();

            if (!categoria) {
                alert("Ingrese una categoria");
                return;
            }
            if (!marca) {
                alert("Ingrese una marca");
                return;
            }
            if (!price) {
                alert("Ingrese un  precio");
                return;
            }
            if (!categoria) {
                alert("Ingrese un stock");
                return;
            }
            if (!categoria) {
                alert("Ingrese una oferta");
                return;
            }
            if (!porcetajedescuento) {
                alert("Ingrese un porcetajedescuento");
                return;
            }
            if (!descripcion) {
                alert("Ingrese una descripcion");
                return;
            }
            confirm('Guardar ?');
        });

    });
    //PARA ELIMINAR UN DATO DE LA TABLA
    function eliminarFila1(ind) { 
        $('#fila1' + ind).remove();
        indice1--; 
        return false;
    }
    function eliminarFila2(ind) { 
        $('#fila2' + ind).remove();
        indice2--; 
        return false;
    }
 
</script>




@endsection