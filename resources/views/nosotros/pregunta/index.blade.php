@extends('layout.basemant')

@section('page-info')

<!-- bootstrap 5-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!--  sospechoso -->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ asset('js/scripts.bundle.js') }}"></script>
    
    
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<!-- mostramos el mensaje despues de hacer un cambio en los resgistros-->
<script src="{{ asset('mensaje.js') }}"> </script>

@endsection



@section('content')
<br>
<div class="row">
    <div class="col col-12">
        <h5>Listado de Preguntas</h5>
        @if (session()->has('respuesta')) {{-- comprueba si existe el valor en sesión --}}
    <script>
       
       mensaje("{{session('respuesta')}}");
   </script>

    {!! session()->forget('respuesta') !!} {{-- borrar el error de sesión --}}
    @endif
    </div>
</div>
<div class="">
    <div class="row">
        <div class="d-flex justify-content-end mb-5" data-kt-docs-table-toolbar="base">
            <a href="{{url('pregunta/create')}}" class="btn btn-primary">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
                    </svg>
                </span>
                Crear
            </a>

        </div>
        <!-- 
        <button type="button" class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#mimodal" data-bs-whatever="@fat">Open modal for @fat</button>
-->

        <div class="table-responsive">
            <div class="d-flex flex-stack">
                <div class="d-flex btn-excel-datatable"></div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" id="buscador" class="form-control form-control-solid w-250px ps-15" autocomplete="off" placeholder="Buscar en el listado" />
                    </div>

                </div>
            </div>
            <table id="listado" data-page-length='5' class="table table-row-bordered table-row-success table-rounded border gs-7 align-middle" style="width: 92,5vw;">
                <thead>
                    <tr class=" text-primary fw-bold fs-6" id="fila">
                        <th class="w-80px">Id</th>
                        <th class="w-80px">Pregunta</th>   
                        <th class="w-80px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>

        </div>

        
    </div>

    <div>
        <section>

            <div id="pagination" style="color: black;"></div>
        </section>
    </div>
    <br>
    <br>
</div>
@endsection


@section('script')
@include('helpers.data-managment')
  
<script>
    
    var preguntas = @json($preguntas);
    var urlpreguntas = "{{ url('pregunta') }}";


    var table = defineTable($('#listado'), [], [0, 1 ], 'preguntas', function() {}, false, false, false);

    $('#buscador').keyup(function(e) {
        table.search(e.target.value).draw();
    });
 

    listarOnTable(table, preguntas, 0, [], false, true, true, urlpreguntas, false, []);
</script>


@endsection