@extends('layout.basemant')
@section('page-info')
 

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Nueva Pregunta
            </h1>
        </div>
        <Form method="POST" action="{{ url('pregunta/store') }}">
            @csrf
            <div class="form-group">
                <div class="row">

                     
                    <div class="col-sm-12 col-lg-12 mb-5">
                        <label for="descripcion" class="form-label" required>Pregunta</label>
                        <input type="text" placeholder=" ingrese Pregunta" name="pregunta" id="pregunta" class="form-control" required>
                    </div>
                    
                    

                    <hr>

                    <h5>Agregar Respuestas</h5>

                    

                    <div class="col-sm-12 col-lg-12 mb-5">
                        <label for="respuesta" class="form-label" required>Respuesta</label>
                        <input type="text" placeholder=" Ingrese Respuesta" name="respuesta" id="respuesta" class="form-control">
                    </div>
                     

                    <div class="d-flex justify-content-end ">
                        <button type="button" class="btn btn-info" id="addDetalle"><i class="fa fa-plus"></i> Agregar Respuesta</button>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-row-bordered gy-5 gs-5" id="respuestas">
                            <thead class="fw-bold text-primary">
                                <tr>
                                    <th>Respuesta</th>
                                     

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
                        <button type="submit" value="Guardar" id="Guardar" class="btn btn-primary"><i class="fas fa-save"> </i>&nbsp;Guardar Pregunta</button>
                        <a href="{{url('pregunta/index')}}" type="button" class="btn btn-light">
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
        var tabla = document.getElementById(respuestas);

        $('#addDetalle').click(function() {

            //datos del detalleSensor
            var respuesta = $('[name="respuesta"]').val();
            

            //alertas para los  
            if (!respuesta) {
                alert("ingrese una respuesta");
                return;
            }
            


            var LDPregunta = [];
            var tam = LDPregunta.length;
            LDPregunta.push(respuesta);

            filaDetalle = '<tr id="fila' + indice +
                '"><td><input  type="hidden" name="Lrespuestas[]" value="' + LDPregunta[0] + '"required>' + LDPregunta[0] + 
                '</td><td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila(' + indice + ')" data-id="0"><i class="bi bi-trash-fill"></i></button></td></tr>';

            $("#respuestas>tbody").append(filaDetalle);

            indice++;
             
            
             
            document.getElementById("respuesta").value = "";


        });

        $('#Guardar').click(function() {

            var pregunta = $('[name="pregunta"]').val();
            

            if (!pregunta) {
                alert("Ingrese una pregunta");
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