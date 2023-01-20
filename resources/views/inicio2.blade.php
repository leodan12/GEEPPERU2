@extends('layout.base')
@section('page-info')
<style>
    @media screen and (max-width: 360px) {
        .imagencarrusel {
            height: 150px;
            width: 260px;
        }
    }
    @media screen and (min-width: 360px) {
        .imagencarrusel {
            height: 160px;
            width: 260px;
        }
    }
    @media screen and (min-width: 460px) {
        .imagencarrusel {
            height: 180px;
            width: 360px;
        }
    }
    @media screen and (min-width: 560px) {
        .imagencarrusel {
            height: 200px;
            width: 460px;
        }
    }
    @media screen and (min-width: 660px) {
        .imagencarrusel {
            height: 220px;
            width: 560px;
        }
    }
    @media screen and (min-width: 760px) {
        .imagencarrusel {
            height: 240px;
            width: 660px;
        }
    }
    @media screen and (min-width: 960px) {
        .imagencarrusel {
            height: 290px;
            width: 860px;
        }
    }
    @media screen and (min-width: 1160px) {
        .imagencarrusel {
            height: 360px;
            width: 1060px;
        }
    }
    @media screen and (min-width: 1360px) {
        .imagencarrusel {
            height: 430px;
            width: 1260px;
        }
    }

    @media screen and (min-width: 1560px) {
        .imagencarrusel {
            height: 500px;
            width: 1460px;
        }
    }
    @media screen and (min-width: 1760px) {
        .imagencarrusel {
            height: 570px;
            width: 1660px;
        }
    }

    @media screen and (min-width: 1910px) {
        .imagencarrusel {
            height: 640px;
            width: 1810px;
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

    #oldprice {
        color: #565656;
        text-decoration: line-through;
        margin-top: 50px;
        font-size: 15px;
    }

    .agotado-label {
        background-color: #ff3b19;
        color: #ffffff;
        font-size: 10px;
        font-weight: bold;
        padding: 5px;
        position: absolute;
        top: 0;
        left: 0;
        text-transform: uppercase;
    }
</style>

<style>
        .inputbuscar{
            height: 30px;
            width: 200px;
            border: 1px solid black;
            border-radius: 5px;
            outline: none;
        }

        .btnbuscar{
            background-color: white;
            color: black;
            height: 30px;
            width: 30px;
            border: 1px solid black;
            border-radius: 5px;  
        }
        .btnbuscar:hover{
            background-color: #ff3936;
            color: white;
            height: 30px;
            width: 30px;
            border: 1px solid black;
            border-radius: 5px;  
        }
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



@if($buscarpor == "")


<div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-indicators ">
        @php $contp=0; @endphp
        @foreach($principal as $item)
        @if( $contp == 0)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$contp}}" class="active" aria-current="true" aria-label="Slide 1"></button>
        @else
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$contp}}" aria-label="Slide 2"></button>
        @endif
        @php $contp++; @endphp
        @endforeach
    </div>
    <div class="carousel-inner" style="text-align: center;">
        @php $contp2=0; @endphp
        @foreach($principal as $item)
        @if( $contp2 == 0)
        <div class="carousel-item active" data-bs-interval="4000">
            <img src="principal/{{$item->imagen}}" class="  imagencarrusel" alt="...">
        </div>
        @else
        <div class="carousel-item" data-bs-interval="4000">
            <img src="principal/{{$item->imagen}}" class="  imagencarrusel" alt="...">
        </div>
        @endif
        @php $contp2++; @endphp
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@php $contc=0; @endphp
@foreach($categorias as $cat)
<div id="carruselc" class="carruselc">
    <a href="#" class="left-arrow" id="left_arrow_{{$cat->idcategoria}}" data-cont="{{$contc}}"><img src="carrusel/left-arrow.png" /></a>
    <a href="#" class="right-arrow" id="right_arrow_{{$cat->idcategoria}}" data-cont="{{$contc}}"><img src="carrusel/right-arrow.png" /></a>
    <button id="btncategoria" onclick="window.location.href = '/categoria-producto/{{$cat->nombre}}'"> <b> {{$cat->nombre}} </b> </button>
    <hr>
    <div class="carrusel_{{$contc}}" id="carruselp">
        @php $cont=0; @endphp
        @foreach($productos as $pro)
        @if($pro->idcategoria == $cat->idcategoria)
        <div class="product" id="product_{{$contc}}_{{$cont}}">
            @if($pro->oferta == 1 && $pro->stock > 0)
            <div class="discount-label"> -{{$pro->porcentajedescuento}}% </div>
            @endif
            @if( $pro->stock == 0)
            <div class="agotado-label"> Agotado</div>
            @endif
            <img src="images/{{$pro->image_path}}" /> <br> <br>
            <a href="/producto/{{$pro->name}}" class="productname">
                <h5 class="nombreproducto"> {{ $pro->name }} </h5>
            </a>

            @if($pro->oferta == 1 && $pro->stock > 0)
            <span id="oldprice"> S/{{$pro->price}} </span>&nbsp;
            <span id="price"> S/{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}} </span>
            @else
            <span id="price"> S/{{$pro->price}} </span>
            @endif



            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                <input type="hidden" value="{{ $pro->name }}" id="name" name="name">

                <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                @if($pro->oferta == 1)
                <input type="hidden" value="{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}}" id="price" name="price">
                @endif
                @if($pro->oferta == 0)
                <input type="hidden" value="{{$pro->price}}" id="price" name="price">
                @endif
                <input type="hidden" value="1" id="quantity" name="quantity">

                <a href="#" title="Añadir a la lista de deseos" class="btnlist"><i class="fa-solid fa-heart"></i></a>
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
        @php $cont=$cont+1; @endphp
        @endif
        @endforeach
    </div>

</div>
@php $contc=$contc+1; @endphp
@endforeach

@endif

@if($buscarpor != "")

<div class="titulo ">

  <h3>Busqueda de Productos: {{$buscarpor}}</h3>

  <hr>
</div>
<div class="vista1">
 
  <div class="viewproductos">

    @foreach($productosbusqueda as $pro)
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
        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
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

@endif

@endsection




@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    var current = 0;
    var Nimagenes = [];
    var currentc = [];

    var numProd = 5;

    $(document).ready(function() {
 
        var screenWidth = window.screen.width;
        //var screenHeight = window.screen.height;
        //console.log("Screen width: " + screenWidth);
        //console.log("Screen height: " + screenHeight);

        numProd = ~~(screenWidth / 240);
        //numProd = numProd +1 ;
       // console.log("Screen Width: " + numProd);

        var categorias = @json($categorias);
        var productos = @json($productos);
 

        for (var j = 0; j < categorias.length; j++) {
            $contc = 0;
            for (var i = 0; i < productos.length; i++) {
                if (productos[i].idcategoria == categorias[j].idcategoria) {
                    $contc = $contc + 1;
                }
                Nimagenes[j] = $contc;
                currentc[j] = 0;
            }
            if ($contc <= numProd) {
                //console.log($contc);
                $('#right_arrow_' + categorias[j].idcategoria).css('display', 'none');
                $('#left_arrow_' + categorias[j].idcategoria).css('display', 'none');
            }
        }

        $('.left-arrow').on('click', function() {
            $cont = $(this).data("cont");
            if (currentc[$cont] > 0) {
                currentc[$cont] = currentc[$cont] - 1;
            } else {
                currentc[$cont] = Nimagenes[$cont] - numProd;
            }

            $('.carrusel_' + $cont).animate({
                "left": -($('#product_' + $cont + '_' + currentc[$cont]).position().left)
            }, 600);

            return false;
        });

       
        $('.right-arrow').on('click', function() {
            $cont = $(this).data("cont");

            if (Nimagenes[$cont] > currentc[$cont] + numProd) {
                currentc[$cont] = currentc[$cont] + 1;
            } else {
                currentc[$cont] = 0;
            }

            $('.carrusel_' + $cont).animate({
                "left": -($('#product_' + $cont + '_' + currentc[$cont]).position().left)
            }, 600);

            return false;
        });


    }); 
</script>
@endsection