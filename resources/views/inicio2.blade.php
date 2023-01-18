@extends('layout.base')
@section('page-info')
<style>
    .imagencarrusel {
        width: 100%;
        height: 400px;
    }

    @media screen and (max-width: 991px) {
        .imagencarrusel {
            height: 300px;
            width: 100%;
        }
    }

    @media screen and (max-width: 767px) {
        .imagencarrusel {
            height: 250px;
            width: 100%;
        }
    }

    @media screen and (max-width: 480px) {
        .imagencarrusel {
            height: 200px;
            width: 100%;
        }
    }

    @media screen and (max-width: 430px) {
        .imagencarrusel {
            height: 180px;
            width: 100%;
        }
    }

    @media screen and (max-width: 360px) {
        .imagencarrusel {
            height: 150px;
            width: 100%;
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
@endsection
@section('content')
<div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-indicators">
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
    <div class="carousel-inner">
        @php $contp2=0; @endphp
        @foreach($principal as $item)
        @if( $contp2 == 0)
        <div class="carousel-item active" data-bs-interval="4000">
            <img src="principal/{{$item->imagen}}" class="d-block w-100 imagencarrusel" alt="...">
        </div>
        @else
        <div class="carousel-item" data-bs-interval="4000">
            <img src="principal/{{$item->imagen}}" class="d-block w-100 imagencarrusel" alt="...">
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
        console.log("Screen Width: " + numProd);

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