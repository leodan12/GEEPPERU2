@extends('layout.base')

@section('content')
<br>
<div class="row " style="text-align: center;">
    <div class="col col-12" style="text-align: center;">
        <h6 >NUESTROS PRINCIPIOS</h6>
    </div>
</div>
<br>
<div id="principios" class="row justify-content-center" style="text-align: center;">
    <div id="prin" class="col col-xs-6 col-md-3 col-sm-4 col-lg-2">
        <img   src="{{ asset('imgs/servicio.jpg') }}" title="geepperu" alt="geepperu"   />
        <br>
        <h6>   Servicio  </h6>
        <p>Conocemos las necesidades y expectativas de nuestros clientes Internos y Externos y las satisfacemos.</p>
    </div>
    <div class="col col-xs-6 col-md-3 col-sm-4 col-lg-2">
        <img   src="{{ asset('imgs/trabajoenequipo.jpg') }}" title="geepperu" alt="geepperu"   />
        <br>
        <h6>Trabajo en Equipo</h6>
        <p>Trabajamos con un auténtico espíritu de colaboración, una comunicación abierta y
            el apoyo entre áreas.</p>
    </div>
    <div class="col col-xs-6 col-md-3 col-sm-4 col-lg-2">
        <img   src="{{ asset('imgs/responsabilidad.jpg') }}" title="geepperu" alt="geepperu"   />
        <br>
        <h6>Responsabilidad</h6>
        <p>Aceptamos y cumplimos de manera proactiva y positiva nuestros compromisos individuales y de equipo.</p>
    </div>
    <div class="col col-xs-6 col-md-3 col-sm-4 col-lg-2">
        <img  src="{{ asset('imgs/innovacion.jpg') }}" title="geepperu" alt="geepperu"  />
        <br>
        <h6>Innovacion</h6>
        <p>Somos pioneros en el desarrollo de sistemas y servicios que agreguen valor a la relación con nuestros asociados.</p>
    </div>
    <div class="col col-xs-6 col-md-3 col-sm-4 col-lg-2">
        <img   src="{{ asset('imgs/integridad.jpg') }}" title="geepperu" alt="geepperu"   />
        <br>
        <h6>Integridad</h6>
        <p>Actuamos con honestidad, justicia y respeto en cada una de nuestras actividades y toma de decisiones.</p>
    </div>
</div>



@endsection




@section('script')

@endsection