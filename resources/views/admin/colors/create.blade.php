@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
       <div class="card">
            <div class="card-header">
                <h3>Añadir Color
                    <a href="{{url('admin/colors')}}" class="btn btn-danger btn-sm text-white float-end">Volver</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/colors/create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nombre del Color</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Codigo del Color</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label> <br/>
                        <input type="checkbox" name="status" style="width:30px;height:30px" /> Checked=Oculto,UnChecked=Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection