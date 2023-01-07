@extends('layout.base')

@section('content')
<br>
<div class="row justify-content-center">
    <div class="col">
        <h6>PREGUNTAS FRECUENTES</h6>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="accordion accordion-flush" id="accordionFlushExample">

        @foreach($preguntas as $pregunta )
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading{{$pregunta->id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$pregunta->id}}" aria-expanded="false" aria-controls="flush-collapse{{$pregunta->id}}">
                        {{$pregunta->pregunta}}
                    </button>
                </h2>
                <div id="flush-collapse{{$pregunta->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$pregunta->id}}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            @foreach($respuestas as $respuesta)
                            @if($pregunta->id == $respuesta->pregunta_id) 
                            <li>{{$respuesta->respuesta}}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach  
           
           
        </div>
    </div>
</div>



@endsection




@section('script')

@endsection