@extends('layout.base')
@section('page-info')
<style>
  .product {
    display: inline-block;
    width: 220px;
    text-align: center;
    border: 1px solid #CCCCCC;
    height: 320px;
    margin-right: 5px;
    margin-top: 5px;
    position: relative;

  }

  .product img {
    margin-top: 10px;
  }

  .viewproductos {
    text-align: center;
    width: 75%;
    right: 0px;
    margin-left: 10px;
    float: right;
    display: block;
    margin-bottom: 50px;
  }

  .vista1 {
    width: 100%;
  }

  .titulo {
    width: 100%;
    text-align: center;
  }

    .viewproductos {
      width: 100%;
      float: left;
    }
  

  .discount-label {
    background-color: #ff3b19;
    color: #ffffff;
    font-size: 11px;
    font-weight: bold;
    padding: 5px;
    position: absolute;
    top: 0;
    right: 0;
    text-transform: uppercase;
  }

  .discount-label1 {
    background-color: #ff3b19;
    color: #ffffff;
    font-size: 10px;
    font-weight: bold;
    padding: 3px;
    position: absolute;
    top: 0;
    left: 0;
    text-transform: uppercase;
  }

  #price2 {
    color: #ed5e35;
    font-weight: bold;
    margin-top: 10px;
    font-size: 12px;
  }

  #oldprice2 {
    color: #565656;
    text-decoration: line-through;
    margin-top: 10px;
    font-size: 12px;
  }

  .agotado-label {
    background-color: #ff3b19;
    color: #ffffff;
    font-size: 10px;
    font-weight: bold;
    padding: 5px;
    position: absolute;
    top: 0;
    right: 0;
    text-transform: uppercase;
  }
</style>
@endsection
@section('content')
<div class="titulo ">

  <h3>{{$productos[0]->categoria}}</h3>

  <hr>
</div>
<div class="vista1">
 
  <div class="viewproductos">

    @foreach($productos as $pro)
    <div class=" product">
      <img src="../images/{{$pro->image_path}}" alt="Producto" width="100%" height="140px">
      @if($pro->oferta == 1 && $pro->stock > 0)
      <div class="discount-label"> -{{$pro->porcentajedescuento}}%</div>
      @endif
      @if( $pro->stock == 0)
      <div class="agotado-label"> Sin Stock</div>
      @endif
      <a href="/producto/{{ $pro->name }}" class="productname nombreproducto">
                <h5 class="nombreproducto"> {{ $pro->name }} </h5>
      </a>
      @if($pro->oferta == 1 && $pro->stock > 0)
      <span id="oldprice"> S/{{$pro->price}} </span> &nbsp;
      <span id="price"> S/{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}} </span>
      @else
      <span id="price"> S/{{$pro->price}} </span>
      @endif
      <form action="{{ route('cart.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $pro->idproducto }}" id="id" name="id">
        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
        @if($pro->oferta == 1)
        <input type="hidden" value="{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}}" id="price" name="price">
        @endif
        @if($pro->oferta == 0)
        <input type="hidden" value="{{$pro->price}}" id="price" name="price">
        @endif
        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
        <input type="hidden" value="1" id="quantity" name="quantity">

        <a href="#" title="añadir a la lista de deseos" class="btnlist"><i class="fa-solid fa-heart"></i></a>
        @if( $pro->stock == 0)
        <a href="/producto/{{ $pro->name }}" title="Ver Producto" class="btnver">
          <p> &nbsp; <i class="fa-solid fa-eye"></i> VER PRODUCTO &nbsp;</p>
        </a>
        @else
        <button class="btncart" title="añadir al carrito">
          <i class="fa fa-shopping-cart"></i> AÑADIR AL CARRITO
        </button>
        @endif


      </form>
    </div>
    @endforeach


  </div>

  
</div>



@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@endsection