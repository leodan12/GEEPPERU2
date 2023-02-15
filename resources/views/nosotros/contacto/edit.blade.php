@extends('layout.basemant')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="p-3">
            <h1 class="anchor fw-bolder">
                Editar Consulta
            </h1>
        </div>
        <div class="p-4">
            <div class="rounded border p-10">
                <Form method="POST" action="{{ url('contactanos/update',$consulta->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 mb-5">
                            <label for="nombres" class="required form-label">Nombres</label>
                            <input type="text" placeholder=" ingrese nombres" name="nombres" id="nombres" class="form-control" required value="{{$consulta->nombres}}">
                        </div>
                        <div class="col-sm-6 col-lg-6 mb-5">
                            <label for="apellidos" class="required form-label">Apellidos</label>
                            <input type="text" step=0.1 placeholder=" Ingrese apellidos" name="apellidos" id="apellidos" class="form-control" required value="{{$consulta->apellidos}}">
                        </div>
                         
                        <div class="col-sm-6 col-lg-6 mb-5">
                            <label for="email" class="required form-label">Email</label>
                            <input type="email" step=0.01 placeholder=" Ingrese email" name="email" id="email" class="form-control" required value="{{$consulta->email}}" >
                        </div>

                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="celular" class="required form-label">Celular</label>
                            <input type="text" placeholder=" ingrese celular" name="celular" id="celular" class="form-control" required value="{{$consulta->telefono}}">
                        </div> 
                        
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="rol_id" class="required form-label">Servicio </label>
                            <select class="required form-select" name="servicio" id="servicio" required>
                                <option  disabled>Seleccione un Servicio</option>
                                 <option   value="VENTAS ONLINE" {{"VENTAS ONLINE" == $consulta->asunto ? 'selected':''}}>VENTAS ONLINE</option>
                                <option   value="VENTAS TIENDA" {{"VENTAS TIENDA" == $consulta->servicio ? 'selected':''}}>VENTAS TIENDA</option>
                                <option   value="SOPORTE TECNICO"{{"SOPORTE TECNICO" == $consulta->servicio ? 'selected':''}}>SOPORTE TECNICO</option>
                                 
                            </select>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="asunto" class="required form-label">Asunto </label>
                            <input type="text" placeholder=" Ingrese asunto" name="asunto" id="asunto" class="form-control" required value="{{$consulta->asunto}}">
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <label for="estado" class="required form-label">Estado </label>
                            <select class="required form-select" name="estado" id="estado" required>
                                <option   disabled>Seleccione Estado</option>
                                
                                <option selected value="POR REVOLVER">POR RESOLVER</option>
                                <option   value="RESPONDIDO">RESPONDIDO</option>
                                <option   value="RESUELTO">RESUELTO</option>
                                 
                            </select>
                        </div>
                        <div class="col-sm-12 col-lg-12 mb-5">
                        <label for="comentario" class="form-label" required>Comentario</label>
                        <textarea name="comentario" id="comentario" rows="5" cols="50" class="form-control" placeholder="Escribe un comentario detallando tu consulta" required>{{$consulta->comentario}}</textarea>
                    </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="far fa-check-circle"></i>
                        Actualizar
                    </button>
                    <a href="{{url('contactanos/index')}}" type="button" class="btn btn-light">
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