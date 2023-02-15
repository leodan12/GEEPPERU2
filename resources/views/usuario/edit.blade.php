@extends('layout.basemant')
@section('page-info')

<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<!-- mostramos el mensaje despues de hacer un cambio en los resgistros-->
<script src="{{ asset('mensaje.js') }}"> </script>

@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Editar Usuario
            </h1>
            @if (session()->has('respuesta')) {{-- comprueba si existe el valor en sesión --}}
    <script>
       
       mensaje("{{session('respuesta')}}");
   </script>

    {!! session()->forget('respuesta') !!} {{-- borrar el error de sesión --}}
    @endif
        </div>
        <div class="p-4">
            <div class="rounded border p-10">
                <Form method="POST" action="{{ url('usuario/update',$usuario->id) }}">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 col-lg-6 mb-5">
                            <label for="descripcion" class="required form-label">Nombre </label>
                            <input type="text" placeholder=" ingrese nombre" name="name" id="name" class="form-control" required value="{{$usuario->name}}">
                        </div>
                        <div class="col-md-12 col-lg-6 mb-5">
                            <label for="descripcion" class="required form-label">Email </label>
                            <input type="email" placeholder=" ingrese email" name="email" id="email" class="form-control" required value="{{$usuario->email}}">
                        </div>


                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="rol_id" class="required form-label">Categoria </label>
                            <select class="required form-select" name="rol_id" id="rol_id">
                                <option selected disabled>Seleccione un rol</option>
                                @foreach($roles as $item)
                                <option value="{{$item->id}}" {{$item->id == $usuario->rol_id ? 'selected':''}}>{{$item->rol}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-5">
                            <label for="password" class="required form-label">Contraseña (Min 8 caracteres)</label>
                            <input type="password"   placeholder=" Ingrese descripcion" name="password" id="password" class="form-control" required value="{{$usuario->password}}">
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-5">
                            <label for="password" class="required form-label">Confirmar Contraseña </label> <span id="result"></span>
                            <input type="password"  placeholder=" Ingrese descripcion" name="password1" id="password1" class="form-control" required value="{{$usuario->password}}">
                        </div>
                    </div>
                     

                    <button type="submit" class="btn btn-primary" id="enviar">
                        <i class="far fa-check-circle"></i>
                        Aceptar
                    </button>
                    <a href="{{url('rol/index')}}" type="button" class="btn btn-light">
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
 
<script>
   
   password.oninput = function() {
       //result.innerHTML = password.value;
       verificar();
   }
   password1.oninput = function() { 
       verificar();
   }
   function verificar() {

       password1 = document.getElementById('password');
       password2 = document.getElementById('password1');
       enviar = document.getElementById('enviar');

       if (password1.value == password2.value) {
           if(password1.value.length >= 8){
           password1.style.borderColor = "green";
           password2.style.borderColor = "green";
           enviar.disabled = false;
        }
       } else {
           password1.style.borderColor = "red";
           password2.style.borderColor = "red";
           enviar.disabled = true;
       }
   }
</script>
@endsection