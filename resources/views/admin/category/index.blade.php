@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
       <div class="card">
        <div class="card-header">
            <h3>Categoria
                <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Agregar Categoria</a>
            </h3>
        </div>

       </div>
                 
    </div>
</div>
@endsection