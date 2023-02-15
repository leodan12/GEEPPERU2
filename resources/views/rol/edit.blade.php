@extends('layout.basemant')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Editar Rol
            </h1>
        </div>
        <div class="p-4">
            <div class="rounded border p-10">
                <Form method="POST" action="{{ url('rol/update',$rol->id) }}">
                    @csrf
                    <div class="row">
                       
                        <div class="col-md-6 col-lg-6 mb-5">
                            <label for="rol" class="required form-label">Rol </label>
                            <input type="text" placeholder=" ingrese rol" name="rol" id="rol" class="form-control" required value="{{$rol->rol}}">
                        </div>
                        
                        <div class="col-sm-12 col-lg-12 mb-5">
                            <label for="descripcion" class="required form-label">Descripcion </label>
                            <input type="text" placeholder=" Ingrese descripcion" name="descripcion" id="descripcion" class="form-control" required value="{{$rol->descripcion}}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
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
 
@endsection