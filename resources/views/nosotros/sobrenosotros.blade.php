@extends('layout.base')

@section('content')
<br>
<div class="row justify-content-center">
    <div class="col">
        <h6>SOBRE NOSOTROS</h6> 
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <img src="{{ asset('imgs/geepperuinicio.jpg') }}" title="geepperu" alt="geepperu" width="100%" height="450px" />

    </div>
    <div class="col-lg-6">
        <img src="{{ asset('imgs/geepperuinicio2.jpg') }}" title="geepperu" alt="geepperu" width="100%" height="450px" />


    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <h3>Bienvenidos Geep Peru S.R.L</h3>
        <p>Somos una empresa peruana totalmente dedicada a la comercialización de
            equipos de cómputo, partes, accesorios, periféricos y brinda soluciones de toda índole,
            financiamientos con las marcas más prestigiosas del mercado.
            Asimismo, nuestra experiencia nos permite ofrecerles SOLUCIONES INTEGRALES a los
            principales proyectos informáticos de su empresa, con absoluta seriedad y seguridad
            basándonos en el logro de objetivos comunes.

        </p>
        <img src="{{ asset('imgs/geepperupublicidad.jpg') }}" title="geepperu" alt="geepperu" width="100%" height="200px" />

        <p>Tenemos personal calificado con años de experiencia ininterrumpida trabajando en las áreas
            respectivas para darles una asesoría adecuada en productos de tecnología de información.
            Somos una empresa 100% legal en nuestras actividades de comercialización. Nuestro objetivo es
            poder brindarle el mayor nivel de servicio y soluciones como, política corporativa, con plazos de
            atención rápidos y oportunos.
        </p>
        <p>Contamos actualmente con un local de atención al público con una sala de showroom para que puedan
            ver en situ los equipos en promoción, y la gama de productos de tecnología de información de última
            generación vigentes y un área para atención alsegmento corporativo.
            Así mismo contamos con un área de soporte técnico el cual está disponible a cualquier falla de algún
            equipo o alguna solución implementada en su empresa, la atención de algún problema suscitado
            puede ser vía teléfono, Email, Skype, etc. y el tiempo de respuesta es el tiempo de demora nuestro
            técnico en llegar a sus instalaciones</p>
    </div>
    <div class="col-lg-6">
        <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fgeepperuoficial%2Fvideos%2F1218044658958906%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
        <br>
        <h4>Ubícanos!</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d987.4681187384631!2d-79.03072527086803!3d-8.114464971956897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d120d07dfbf%3A0xf5641a979fb99073!2sGEEP%20PERU%20SRL!5e0!3m2!1sen!2spe!4v1670252384822!5m2!1sen!2spe" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>
<div class="row justify-content-center">
    <div class="col-lg-4">
        <img src="{{ asset('imgs/mision.jpg') }}" title="geepperu" alt="geepperu" width="100%" height="200px" />
        <br> <br>
        <p>Brindar Soluciones Informáticas con mayor Valor Agregado buscando una satisfacción
            integral de nuestros clientes y el bienestar de nuestra sociedad</p>
    </div>
    <div class="col-lg-4">
        <img src="{{ asset('imgs/vision.jpg') }}" title="geepperu" alt="geepperu" width="100%" height="200px" />
        <br> <br>
        <p>Ser una organización internacional, líder en la distribución de productos y soluciones para
            el procesamiento de la información, manteniendo relaciones «ganar-ganar» con nuestros clientes y proveedores, el
            constante desarrollo de nuestros empleados y un rendimiento competitivo para los accionistas.</p>
    </div>
    <div class="col-lg-4">
        <img src="{{ asset('imgs/valores.jpg') }}" title="geepperu" alt="geepperu" width="100%" height="200px" />
        <br> <br>
        <ul>
            <li>Servicio</li>
            <li>Trabajo en Equipo</li>
            <li>Responsabilidad</li>
            <li>Integridad</li>
        </ul>

    </div>
</div>

@endsection




@section('script')

@endsection