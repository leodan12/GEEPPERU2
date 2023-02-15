@extends('layout.basemant')
@section('page-info')
 

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Nueva Descripcion
            </h1>
        </div>
        <Form method="POST" action="{{ url('descripcion/store') }}">
            @csrf
            <div class="form-group">
                <div class="row">

                     
                    <div class="col-sm-12 col-lg-12 mb-5">
                        <label for="descripcion" class="form-label" required>Descripcion</label>
                        <input type="text" placeholder=" ingrese descripcion" name="descripcion" id="descripcion" class="form-control" required>
                    </div>
                    
                    

                    <hr>

                    <h5>Agregar Especificaciones</h5>

                    <br><br>

                    <div class="col-sm-12 col-lg-12 mb-5">
                        <label for="especificacion" class="form-label" required>Especificacion</label>
                        <input type="text" placeholder=" Ingrese especificacion" name="especificacion" id="especificacion" class="form-control">
                    </div>
                     

                    <div class="d-flex justify-content-end ">
                        <button type="button" class="btn btn-info" id="addDetalle"><i class="fa fa-plus"></i> Agregar Especificaciones</button>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-row-bordered gy-5 gs-5" id="especificaciones">
                            <thead class="fw-bold text-primary">
                                <tr>
                                    <th>Especificacion</th> 
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
                        <button type="submit" value="Guardar" id="Guardar" class="btn btn-primary"><i class="fas fa-save"> </i>
                        &nbsp;Guardar Descripcion</button>
                        <a href="{{url('descripcion/index')}}" type="button" class="btn btn-light">
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
    
    var indice = 0;
   
    $(document).ready(function() {

         
        //PARA AGREGAR DETALLES DE BATCH A LA TABLA
        var tabla = document.getElementById(especificaciones);

        $('#addDetalle').click(function() {

            //datos del detalleSensor
            var especificacion = $('[name="especificacion"]').val();
            

            //alertas para los  
            if (!especificacion) {
                alert("ingrese una especificacion");
                return;
            }
            


            var LDEspecificacion = [];
            var tam = LDEspecificacion.length;
            LDEspecificacion.push(especificacion);

            filaDetalle = '<tr id="fila' + indice +
                '"><td><input  type="hidden" name="Lespecificaciones[]" value="' + LDEspecificacion[0] + '"required>' + LDEspecificacion[0] + 
                '</td><td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila(' + indice + ')" data-id="0"><i class="bi bi-trash-fill"></i></button></td></tr>';

            $("#especificaciones>tbody").append(filaDetalle);

            indice++;
             
            
             
            document.getElementById("especificacion").value = "";


        });

        $('#Guardar').click(function() {

            var descripcion = $('[name="descripcion"]').val(); 
            if (!descripcion) {
                alert("Ingrese una descripcion");
                return;
            } 
            confirm('Guardar ?');
        });

    });
    //PARA ELIMINAR UN DATO DE LA TABLA
    function eliminarFila(ind) {
        
 
        $('#fila' + ind).remove();
        indice--;
       
        return false;
    }
 
</script>
@endsection