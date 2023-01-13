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

  .viewmasvendidos {
    width: 13%;
    float: left;
    margin-right: 10px;
    text-align: left;
  }


  .rowmasvendidos {
    margin-top: 10px;
    width: 230px;

  }

  .colmasvendidos {
    margin-top: 10px;
    width: 230px;
    height: 125px;
    border: #CCCCCC 1px solid;
    position: relative;
  }


  .imagenmasvendido {
    margin-top: 10px;
    width: 100px;
    margin-right: 5px;
    margin-left: 5px;
    height: 100px;
    left: 0;
    top: 0;
    float: left;
  }

  .nombremasvendido {
    margin-top: 10px;
    width: 112px;
    margin-right: 5px;
    float: right;
    height: 80px;
    top: 0;
    right: 0;
    white-space: pre-line;
    text-overflow: ellipsis;
    overflow: hidden;
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

  .viewmasvendidos1 {
    width: 100%;
    text-align: center;
  }

  .rowmasvendidos1 {
    width: 100%;
  }

  .colmasvendidos1 {
    width: 260px;
    height: 140px;
    display: inline-block;
    border: #CCCCCC 1px solid;
    margin-top: 5px;
    position: relative;
  }

  .imagenmasvendido1 {
    margin-top: 10px;
    width: 120px;
    margin-right: 5px;
    margin-left: 5px;
    height: 120px;
    left: 0;
    top: 0;
    float: left;
  }

  .nombremasvendido1 {
    margin-top: 10px;
    width: 120px;
    margin-right: 5px;
    float: right;
    height: 76px;
    top: 0;
    right: 0;
    white-space: pre-line;
    text-overflow: ellipsis;
    overflow: hidden;
  }

  @media screen and (min-width: 856px) {
    .viewmasvendidos1 {
      display: none;
    }

  }

  @media screen and (max-width: 855px) {
    .viewmasvendidos {
      display: none;
      float: right;
      bottom: 0;
    }

    .viewproductos {
      width: 100%;
      float: left;
    }
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

  <div class="viewmasvendidos">
    <div class="rowmasvendidos">
      <h4> LOS MÁS VENDIDOS</h4>
      <hr>
      @foreach($masvendidos as $pro)
      <div class="colmasvendidos">
        @if($pro->oferta == 1 && $pro->stock > 0)
        <div class="discount-label1"> -{{$pro->porcentajedescuento}}%</div>
        @endif
        @if( $pro->stock == 0)
        <div class="discount-label1"> Agotado</div>
        @endif
        <img class="imagenmasvendido" src="../images/{{$pro->image_path}}" alt="Producto" width="100%" height="140px">
        <a href="/producto/{{ $pro->name }}" class="productname ">
                <h5 class="nombremasvendido"> {{ $pro->name }} </h5>
        </a>
        @if($pro->oferta == 1 && $pro->stock > 0)
        <span id="oldprice2"> S/{{$pro->price}} </span>
        <span id="price2"> S/{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}} </span>
        @else
        <span id="price2"> S/{{$pro->price}} </span>
        @endif
      </div>
      @endforeach
    </div>
  </div>

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
        <a href="#" title="Ver Producto" class="btnver">
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

  <div class="viewmasvendidos1">

    <div class="rowmasvendidos1">

      <h3>LOS MÁS VENDIDOS</h3>
      <hr>
      @foreach($masvendidos as $pro)
      <div class="colmasvendidos1">
      @if($pro->oferta == 1 && $pro->stock > 0)
        <div class="discount-label1"> -{{$pro->porcentajedescuento}}%</div>
        @endif
        @if( $pro->stock == 0)
        <div class="agotado-label"> Agotado</div>
        @endif
        <img class="imagenmasvendido1" src="../images/{{$pro->image_path}}" alt="Producto" width="100%" height="140px">
        
        <a href="#" class="productname ">
                <h5 class="nombremasvendido1"> {{ $pro->name }} </h5>
            </a>
        @if($pro->oferta == 1  && $pro->stock > 0)
        <span id="oldprice2"> S/{{$pro->price}} </span> &nbsp;
        <span id="price2"> S/{{$pro->price - (($pro->price*$pro->porcentajedescuento)/100)}} </span>
        @else
        <span id="price2"> S/{{$pro->price}} </span>
        @endif
      </div>
      @endforeach
    </div>
  </div>

</div>



@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@endsection