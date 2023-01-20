@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
       <div class="card">
            <div class="card-header">
                <h3>Productos
                    <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm text-white float-end">Agregar Producto</a>
                </h3>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>    
@endsection