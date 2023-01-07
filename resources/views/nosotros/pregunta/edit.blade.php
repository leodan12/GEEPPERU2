@extends('layout.base')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Editar Pregunta
            </h1>
        </div>
        <div class="p-4">
            <div class="rounded border p-10">
                <Form method="POST" action="{{ url('pregunta/update',$pregunta->id) }}">
                    @csrf
                    <div class="row">

                        <div class="col-sm-12 col-lg-12 mb-5">
                            <label for="pregunta" class="required form-label">Pregunta</label>
                            <input type="text" placeholder=" ingrese pregunta" name="pregunta" id="pregunta" class="form-control" required value="{{$pregunta->pregunta}}">
                        </div>


                        <hr>

                        <h5>Agregar Respuestas</h5>


                        <div class="col-sm-12 col-lg-12 mb-5">
                            <label for="respuesta" class="form-label" required>Respuesta</label>
                            <input type="text" placeholder=" Ingrese Respuesta" name="respuesta" id="respuesta" class="form-control">
                        </div>

                        @php $ind=0 ; @endphp
                        @php $indice=count($respuestas) ; @endphp
                        <div class="d-flex justify-content-end ">
                            <button type="button" class="btn btn-info" id="addDetalleBatch" onclick="agregarFila('{{$indice}}')"><i class="fa fa-plus"></i> Agregar Detalle</button>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-row-bordered gy-5 gs-5" id="detalle">
                                <thead class="fw-bold text-primary">
                                    <tr>

                                        <th>Respuesta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($respuestas as $item)
                                    @php $ind++; @endphp
                                    <tr id="fila{{$ind}}">

                                        <td> {{$item->respuesta}}</td>
                                        <td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="eliminarFila(  '{{$item->idrespuesta}}','{{$ind}}'  )" data-id="0"><i class="bi bi-trash-fill"></i></button></td>

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
                    <a href="{{url('pregunta/index')}}" type="button" class="btn btn-light">
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
        var respuesta = $('[name="respuesta"]').val();


        //alertas para los detallesBatch
        if (!respuesta) {
            alert("ingrese una respuesta");
            return;
        }


        var LDpregunta = [];
        var tam = LDpregunta.length;
        LDpregunta.push(respuesta);

        filaDetalle = '<tr id="fila' + indice +
            '"><td><input  type="hidden" name="Lrespuestas[]" value="' + LDpregunta[0] + '"required>' + LDpregunta[0] +
            '</td><td><button type="button" class="btn btn-link btn-color-danger btn-sm delete" onclick="quitarFila(' + indice + ')" data-id="0"><i class="bi bi-trash-fill"></i></button></td></tr>';

        $("#detalle>tbody").append(filaDetalle);

        indice++;
        //preciototal(); 

        document.getElementById("respuesta").value = "";
    }
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

                $.get('/deletedetallepregunta/' + idBD, function(data) {
                    if (data[0]) {
                        $('#fila' + ind).remove();
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
                })

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
                $('#fila' + ind).remove();
                indice--;
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
</script>
@endsection