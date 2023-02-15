@extends('layout.base')

@section('content')
<br>
<div class="row justify-content-center">
    <div class="col">
        <h6>DETALLES DE MI CUENTA</h6>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Direccion</button>
                <button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Detalles</button>
                <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Pedidos</button>
                <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Cerrar Sesion</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0"> Aca podra gestionar sus direcciones de envio </div>
            <div class="tab-pane fade  show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <br>
                <h4> Detalles de la cuenta </h4> <br><br>
                <Form method="POST">
                    @csrf
                    <div class="row" style="align-items: center;">
                        <div class="col-md-12 col-lg-6 mb-5">
                            <label for="descripcion" class="required form-label">Nombre </label>
                            <input type="text" placeholder=" ingrese nombre" name="name" id="name" class="form-control" required value="{{$usuario->name}}" readonly>
                        </div>
                        <div class="col-md-12 col-lg-6 mb-5">
                            <label for="descripcion" class="required form-label">Email </label>
                            <input type="email" placeholder=" ingrese email" name="email" id="email" class="form-control" required value="{{$usuario->email}}" readonly>
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-5">
                            <label for="password" class="required form-label">Contraseña (Min 8 caracteres)</label>
                            <input type="password" placeholder=" Ingrese descripcion" name="password" id="password" class="form-control" required value="{{$usuario->password}}">
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-5">
                            <label for="password" class="required form-label">Confirmar Contraseña </label> <span id="result"></span>
                            <input type="password" placeholder=" Ingrese descripcion" name="password1" id="password1" class="form-control" required value="{{$usuario->password}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 mb-5" style="align-items: center;">
                        <button type="submit" class="btn btn-primary" id="enviar" disabled>
                            <i class="far fa-check-circle"></i>
                            Actualizar Datos
                        </button>
                    </div>
                </Form>
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0"> Pedidos y Compras Realizadas </div>
            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
<br>
               <h5>  <b>  Gracias por su visita a nuestra pagina. Hasta Pronto!</b> </h5>
<br><br>
                <div class="menu-item px-5">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <button type="submit" style="background-color: red; border-radius:30px;  "> <b class="menu-link px-5"> Cerrar Sesion </b> </button>

                    </form>

                </div>

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
            if (password1.value.length >= 8) {
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