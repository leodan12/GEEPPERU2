@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
       <div class="card">
            <div class="card-header">
                <h3>Lista de Colores
                    <a href="{{url('admin/colors/create')}}" class="btn btn-primary btn-sm text-white float-end">Agregar Color</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE DEL COLOR</th>
                            <th>CODIGO DEL COLOR</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $item)
                        <tr>
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->code}}</td>
                            <td>{{ $item->status ? 'Oculto':'Visible'}}</td>
                            <td>
                                <a href="{{ url('admin/colors/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ url('admin/colors/'.$item->id.'/delete') }}" onclick="return confirm('¿Esta seguro en eliminar el color?')" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>    
@endsection