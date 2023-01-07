@extends('layout.base')

@section('page-info')
<script src="{{ asset('mensaje.js') }}"> </script>
@endsection
@section('content')
<br>
<div class="row justify-content-center">
    <div class="col">
        <h5>CONTÁCTANOS!</h5>
    </div>
</div>
<br>
<div class="row">
    <div class="col col-12">
      
        @if (session()->has('respuesta')) {{-- comprueba si existe el valor en sesión --}}
        <script>
            mensaje("{{session('respuesta')}}");
        </script>

        {!! session()->forget('respuesta') !!} {{-- borrar el error de sesión --}}
        @endif
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-6">

        <img src="{{ asset('imgs/contact.jpg') }}" title="geepperu" alt="geepperu" width="100%" height="200px" />
        <h6>Rellene el formulario indicando claramente la consulta que desea realizar.
            Este mensaje será atendido en el transcurso de las 24 horas de enviado.</h6>
        <Form method="POST" action="{{ url('contactanos/store') }}">
            @csrf
            <div class="form-group">
                <div class="row">


                    <div class="col-sm-12 col-lg-6 mb-5">
                        <label for="nombres" class="required form-label"  >Nombres</label>
                        <input type="text" placeholder=" ingrese Pregunta" name="nombres" id="nombres" class="form-control" required>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-5">
                        <label for="apellidos" class="required form-label"  >Apellidos</label>
                        <input type="text" placeholder=" Ingrese Apellidos" name="apellidos" id="apellidos" class="form-control" required>
                    </div>
                    <div class="col-sm-12 col-lg-6 mb-5">
                        <label for="email" class="required form-label"  >Email</label>
                        <input type="text" placeholder=" Ingrese Email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="col-sm-12 col-lg-6 mb-5">
                        <label for="celular" class="required form-label"  >Celular</label>
                        <input type="text" placeholder=" Ingrese Celular" name="celular" id="celular" class="form-control" required>
                    </div>
                    <div class="col-sm-12 col-lg-6 mb-5">
                        <label for="servicio" class="required form-label"  >Servicios</label>

                        <select name="servicio" id="servicio" class="form-control" required>
                            <option select disabled> Seleccione un servicio:</option>
                            <option value="VENTAS ONLINE">VENTAS ONLINE</option>
                            <option value="VENTAS TIENDA">VENTAS TIENDA</option>
                            <option value="SOPORTE TECNICO">SOPORTE TECNICO</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-lg-12 mb-5">
                        <label for="asunto" class="required form-label"  >Asunto</label>
                        <input type="text" placeholder=" Ingrese Asunto" name="asunto" id="asunto" class="form-control" required>
                    </div>
                    <div class="col-sm-12 col-lg-12 mb-5">
                        <label for="comentario" class="required form-label"  >Comentario</label>
                        <textarea name="comentario" id="comentario" rows="5" cols="50" class="form-control" placeholder="Escribe un comentario detallando tu consulta" required></textarea>
                    </div>

                </div>
                <div class="row" style="text-align: left">
                    <div class="col-12">
                        <button type="submit" value="Guardar" id="Guardar" class="btn btn-success"><i class="fas fa-save"> </i>&nbsp;Enviar Consulta</button>

                    </div>

                </div>
                <br>
            </div>

        </Form>



    </div>
    <div class="col-md-6">

        <h4>Ubícanos!</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d987.4681187384631!2d-79.03072527086803!3d-8.114464971956897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d120d07dfbf%3A0xf5641a979fb99073!2sGEEP%20PERU%20SRL!5e0!3m2!1sen!2spe!4v1670252384822!5m2!1sen!2spe" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>

<div class="row justify-content-left">
    <div class="col-lg-6">
        <h5> tambien puedes llamarnos a la central telefonica: &nbsp; <a href="#">
                <i class="fa-solid fa-phone"></i>&nbsp;936108792
            </a> </h5>
        <h5>o escribirnos al correo: &nbsp; <a href="#">
                <i class="fa-solid fa-envelope"></i> &nbsp;ventas@geepperu.com
            </a></h5>
    </div>
</div>
<br>
@endsection




@section('script')

@endsection