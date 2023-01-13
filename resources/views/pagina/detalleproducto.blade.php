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
    margin-top: 2px;
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
    text-align: center;
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
    text-align: left;
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
    
    text-align: center;
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

    .miproducto {
      width: 100%;
    }

    .imagen {
      width: 49%;
    }
    .datos {
      width: 49%;
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
    font-size: 16px;
  }

  #oldprice2 {
    color: #565656;
    text-decoration: line-through;
    margin-top: 10px;
    font-size: 16px;
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

  .miproducto {
    text-align: center;
    width: 80%;
    right: 0px;
    margin-left: 10px;
    float: right;
    display: block;
    margin-bottom: 50px;
  }
  .imagen {
    width: 49%;
    float: left;
    border: 1px solid #CCCCCC;
    margin-right: 2px;
    margin-top: 2px;
    text-align: left; 
    position: relative;
  }
  .datos {
    width: 49%;
    float: right;
    margin-top: 2px;
    /*margin-right: 5px;*/
    text-align: left;
  }
  .precioprod {
    color: #000000;
    font-size: 16px;
    font-weight: bold;
  }
  .imagen {
  overflow: hidden; /* oculta cualquier contenido que se extienda más allá del contenedor padre */
  position: relative; /* permite posicionar los elementos hijos relativos al contenedor padre */
}

.imagen2 {
  /* permite posicionar el contenedor secundario relativo al contenedor padre */
   
}
  .productoimg {
  transition: transform .2s;  
  transform: scale(1);  
  transform-origin: center;
}
.categorian{
   
  font-size: 14px;
  font-weight: bold;
}
.categoria_a{
   
  font-size: 12px;
  font-weight: bold;
  display: inline-block;   
}
 
.milink {
  text-decoration: none;
  color: black;  

}

.milink:hover {
   color: red; 
}
 


</style>
@endsection
@section('content')
<br> 
<div class="vista1">

  <div class="viewmasvendidos">
    <div class="rowmasvendidos">
      <h4>RELACIONADOS</h4>
      <hr>
      @foreach($relacionados as $pro)
      <div class="colmasvendidos" style="text-align: center;">
        @if($pro->oferta == 1 && $pro->stock > 0)
        <div class="discount-label1"> -{{$pro->porcentajedescuento}}%</div>
        @endif
        @if( $pro->stock == 0)
        <div class="discount-label1"> Sin Stock</div>
        @endif
        <img class="imagenmasvendido" src="../images/{{$pro->image_path}}" alt="Producto" width="100%" height="140px">
        <a href="/producto/{{ $pro->name }}" class="productname ">
                <h5 class="nombremasvendido"> {{ $pro->name }} </h5>
        </a>
        @if($pro->oferta == 1 && $pro->stock > 0)
        <span id="oldprice2">S/{{$pro->price}} </span>
        <span id="price2"> S/{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}} </span>
        @else
        <span id="price2"> S/{{$pro->price}} </span>
        @endif
      </div>
      @endforeach
    </div>
  </div>

 <div class="miproducto">
    <div class="imagen">
    
    <div class="imagen2">
    <img class="productoimg" src="../images/{{$producto[0]->image_path}}" alt="{{$producto[0]->producto}}" width="100%" height="400px">
    @if($producto[0]->oferta == 1 && $producto[0]->stock > 0)
      <div class="discount-label"> -{{$producto[0]->porcentajedescuento}}%</div>
    @endif
      @if( $producto[0]->stock == 0)
      <div class="agotado-label"> Sin Stock</div>
      @endif
    </div>
       
    </div>
    <div class="datos">
    <div class="titulo ">
     <h4>{{$producto[0]->producto}}</h4>
 
    </div>
    <div class="datosrow">
   <br>
    <h5 class="disponible"> DISPONIBILIDAD:  &nbsp;
    @if($producto[0]->stock > 0)
    <span class="precioprod" > EN STOCK </span>
    @endif
    @if($producto[0]->stock == 0)
    <span class=" "> SIN STOCK </span>
    @endif
    </h5>
    <br>
    <span class="precioprod" >  PRECIO: &nbsp;</span>
      @if($producto[0]->oferta == 1 && $producto[0]->stock > 0)
      <span id="oldprice"> S/{{$producto[0]->price}} </span> &nbsp;
      <span id="price2"> S/{{number_format($producto[0]->price - (($producto[0]->price*$producto[0]->porcentajedescuento)/100), 2);}} </span>
      @else
      <span id="price"> S/{{$producto[0]->price}} </span>
      @endif
      <br><br>
      <div   ><span class="categorian">CATEGORIAS: &nbsp; </span> 
      @foreach($producto as $item) 
      <h6 class="categoria_a"> 
        <a class="milink" href="/subcategoria-producto/{{$item->subcategoria}}"> 
          {{$item->subcategoria}}.  
        </a> 
      </h6>
      @endforeach
      </div>
       
    </div>

   
    </div>

 </div>

  <div class="viewmasvendidos1">

    <div class="rowmasvendidos1">

      <h3>RELACIONADOS</h3>
      <hr>
      @foreach($relacionados as $pro)
      <div class="colmasvendidos1">
      @if($pro->oferta == 1 && $pro->stock > 0)
        <div class="discount-label1"> -{{$pro->porcentajedescuento}}%</div>
        @endif
        @if( $pro->stock == 0)
        <div class="agotado-label"> Agotado</div>
        @endif
        <img class="imagenmasvendido1" src="../images/{{$pro->image_path}}" alt="Producto" width="100%" height="140px">
        <a href="/producto/{{ $pro->name }}" class="productname ">
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

<script>
  const image = document.querySelector('.productoimg');

image.addEventListener('mouseover', () => {
  image.style.transform = 'scale(1.5)'; /* aumenta el tamaño de la imagen al pasar el mouse */
});

image.addEventListener('mouseout', () => {
  image.style.transform = 'scale(1)'; /* vuelve a la normalidad la imagen al salir el mouse*/
});

image.addEventListener('mousemove', (e) => {
 
  var img = e.target;
    var imgWidth = img.width;
    var imgHeight = img.height;
    var x = e.clientX - image.offsetLeft - imgWidth/2; /* obtiene la posición X del mouse */
    var y = e.clientY - image.offsetTop - imgHeight/2; /* obtiene la posición Y del mouse */
    image.style.transformOrigin = x+"px "+y+"px"; /* establece la posición del mouse como el punto de origen para la transformación */
});

</script>
@endsection