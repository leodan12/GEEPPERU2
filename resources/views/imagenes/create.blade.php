@extends('layout.basemant')
@section('page-info')
<!-- mostramos el mensaje despues de hacer un cambio en los resgistros-->
<script src="{{ asset('mensaje.js') }}"> </script>

@endsection

@section('content')
<br>
<div class="row">
    <div class="col col-12">
        <h5>Listado de Imagenes de Inicio</h5>
        @if (session()->has('respuesta')) {{-- comprueba si existe el valor en sesión --}}
        <script>
            mensaje("{{session('respuesta')}}");
        </script>

        {!! session()->forget('respuesta') !!} {{-- borrar el error de sesión --}}
        @endif
       
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="p-1">
            <h1 class="anchor fw-bolder">
                Nueva Imagen para el Inicio
            </h1>
        </div>
        <Form method="POST" action="{{ url('imagenes/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">

                    <div class="col-md-12 col-lg-12 mb-5">
                        <label for="nombre" class="required form-label">Producto</label>
                        <select class="form-select " name="producto_id" id="producto_id" required>
                            <option selected disabled>Seleccione un  Producto</option>
                            @foreach($productos as $item)
                            <option value="{{$item->id}}"  >{{$item->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-12 mb-5">
                        <label for="fecha" class="required form-label">Seleccione una o varias imagenes</label>

                        <input type="file"   name="imagenes[]" accept=".jpg,.jpeg,.png,.webp" class="form-control" required multiple>
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

          
            var nombre = $('[name="producto_id"]').val();
              
            if (!nombre) {
                alert("Seleccione un producto ");
                return;
            }
            
            confirm('Guardar ?');
        }); 

    }); 
  
</script>
@endsection