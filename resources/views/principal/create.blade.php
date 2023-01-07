@extends('layout.base')
@section('page-info')


@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="p-1">
            <h1 class="anchor fw-bolder">
                Nueva Imagen para el Inicio
            </h1>
        </div>
        <Form method="POST" action="{{ url('principal/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">

                    <div class="col-md-12 col-lg-6 mb-5">
                        <label for="nombre" class="required form-label">Nombre</label>
                        <input type="text" placeholder=" ingrese nombre" name="nombre" id="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-12 col-lg-6 mb-5">
                        <label for="fecha" class="required form-label">Seleccione una imagen</label>

                        <input type="file" id="imagen" name="imagen" accept=".jpg,.jpeg,.png,.webp" class="form-control" required>
                    </div>
 
                    <hr> 
                </div>
                <div class="row" style="text-align: center">
                    <div class="col-12">
                        <button type="submit" value="Guardar" id="Guardar" class="btn btn-primary"><i class="fas fa-save"> </i>&nbsp;Guardar</button>
                        <a href="{{url('principal/index')}}" type="button" class="btn btn-light">
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
     
    $(document).ready(function() {

       
  
        $('#Guardar').click(function() {

          
            var nombre = $('[name="nombre"]').val();
            var imagen = $('[name="imagen"]').val(); 

           
            if (!nombre) {
                alert("Ingrese un nombre");
                return;
            }
            if (!imagen) {
                alert("Ingrese una imagen");
                return;
            }

            confirm('Guardar ?');
        }); 

    }); 
  
</script>
@endsection