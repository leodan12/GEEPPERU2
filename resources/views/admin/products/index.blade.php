@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
       <div class="card">
            <div class="card-header">
                <h3>Productos
                    <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm text-white float-end">Agregar Producto</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CATEGORIA</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->category)
                                    {{ $product->category->name }}
                                @else
                                    No hay Categoria
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-sm btn-success">Editar</a>
                                <a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('¿Esta seguro en eliminar el producto?')" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No hay Productos Disponibles </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection