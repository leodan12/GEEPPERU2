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
      
  }
  .imagen2 {  
    overflow: hidden; /* oculta cualquier contenido que se extienda más allá del contenedor padre */
    position: relative; /* permite posicionar los elementos hijos relativos al contenedor padre */
    margin-right: 2px;
    margin-top: 2px;
    text-align: left; 
    position: relative;
    border: 1px solid #CCCCCC;
  }
  .imgsprod img{  
    border: 1px solid #CCCCCC;
    margin-right: 2px;
    margin-top: 2px;
    
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
 
.disponible{
  font-size: 16px;
  font-weight: bold;
  color: #000000;
}
.enstock{
  font-size: 16px;
  font-weight: bold;
  color: #ed5e35;
}
.sinstock{
  font-size: 16px;
  font-weight: bold;
  color: #ed5e35;
}

.inputcantidad{
  width: 55px;
  height:  30px;
  font-size: 16px;
  border-radius: 5px;
  font-weight: bold;
  background-color: #f0e5f1;
  border: 1px solid gray;
  bottom: 10px;
  position: absolute;
}

.inputcant{
  position: relative;
}
 
.btncart {
  background-color: white;
  position: absolute;
  bottom: 10px;
   left: 80px;
   color: black;
   border: none;
   height: 30px;
   border: 1px solid red;
   border-radius: 10px;
}
.btncart:hover {
   color: white;
   background-color: #ff3936;
}
.btnlist {
   position: absolute;
   bottom: 10px;
   left:250px;
   color: black;
   height: 30px;
   width: 30px;
   border: 1px solid red;
   border-radius: 5px; 
}

.btnlist:hover {
   color: white; 
   background-color: #ff3936;
}
.btnlist i {
   position: absolute; 
   left: 15%;
   top: 15%;
   font-size: 20px;
 
}
 
#increment  {
  text-decoration: none;
  font-weight: bold;
  font-size: 12px;
  color: black; 
  position: absolute;  
  bottom: 25px;
  width: 15px;
  height: 15px;
  left: 60px;
  border: 1px solid gray; 
}
#increment:hover  {
  color: white;
  border: 1px solid red;  
  background-color: red;
}
 
#decrement  {
  text-decoration: none;
  font-weight: bold;
  font-size: 12px;
  color: black; 
  position: absolute;  
  bottom: 10px;
  left: 60px;
  width: 15px;
  height: 15px;
  border: 1px solid gray;  
}
#decrement:hover  {
  color: white;
  border: 1px solid red;  
  background-color: red;
}

input[type=number][name=quantity]::-webkit-inner-spin-button,
input[type=number][name=quantity]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
  color: red;
}

.midescripcion {
    text-align: center;
    width: 80%;
    right: 0px;
    margin-left: 10px;
    float: right;
    display: block;
    margin-bottom: 50px;
    border: #CCCCCC 1px solid;
    }
  .misdatos{
    width: 100%;
    display: inline-block; 
     
    align-items: center;
  }
  .descripcion{
    width: 20%; 
    display: inline-block;  
    float: left;
    flex-wrap: wrap; 
     
  }
  .descripcion h5 {
    font-size: 16px;
  color: black; 
  position: absolute; 
  margin-left: 20px;
}
.especificaciones{
    width: 75%;
    display: inline-block;   
  }
  .especificacion{
    width: 38%;
    display: inline-block;  

  }
  .especificacion h5 {
    font-size: 16px;
    color: gray;  
  }
  .dato{
    width: 58%;
    display: inline-block; 
    float: right;
  }
  .dato h5 {
    font-size: 16px;
    color: gray;  
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
        .product2 {
    display: inline-block;
    width: 220px;
    text-align: center;
    border: 1px solid #CCCCCC;
    height: 320px;
    margin-right: 5px;
    margin-top: 5px;
    position: relative;

  }

  .product2 img {
    margin-top: 10px;
  }

  .viewproductos2 {
    text-align: center;
    width: 75%;
    right: 0px;
    margin-left: 10px;
    float: right;
    display: block;
    margin-bottom: 50px;
  }

  .vista2 {
    width: 100%;
  }

  .titulo2 {
    width: 100%;
    text-align: center;
  }

    .viewproductos2 {
      width: 100%;
      float: left;
    }
  

  .discount-label2 {
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

   

  #price21 {
    color: #ed5e35;
    font-weight: bold;
    margin-top: 10px; 
    font-size: 14px; 
    font-weight: bold;
  }

  #oldprice21 {
    color: #565656;
    text-decoration: line-through;
    margin-top: 10px;
    font-size: 14px;  
  }
  #price31 {
    color: #ed5e35;
    font-weight: bold;
    margin-top: 10px; 
    font-size: 12px; 
    font-weight: bold;
  }

  #oldprice31 {
    color: #565656;
    text-decoration: line-through;
    margin-top: 10px;
    font-size: 12px;  
  }

  .agotado-label2 {
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
  .productname2{
   color:black;
   text-decoration:none;
}
.productname2:hover{
   color:red; 
}
 

.btnscartlist2 {
    position: relative;
}
.btncart2 {
    background-color: white;
    position: absolute;
   bottom: 20px;
   left: 55px;
   color: black;
   border: none;
   height: 30px;
   border: 1px solid red;
   border-radius: 10px;
}
.btncart2:hover {
   color: white;
   background-color: #ff3936;
}
.btnlist2 {
   position: absolute;
   bottom: 20px;
   left: 20px;
   color: black;
   height: 30px;
   width: 30px;
   border: 1px solid red;
   border-radius: 5px; 
}

.btnlist2:hover {
   color: white; 
   background-color: #ff3936;
}
.btnlist2 i {
   position: absolute; 
   left: 15%;
   top: 15%;
   font-size: 20px;
 
}
.btnver2 {
    background-color: white;
    position: absolute;
   bottom: 20px;
   left: 55px;
   color: black;
   border: none;
   height: 30px;
   border: 1px solid red;
   border-radius: 10px;
   text-decoration:none;
   margin-left: 10px;
   margin-right: 10px;
   text-align: center; 
}

.btnver2 p{
margin-top: 5px;
}
.btnver2:hover {
   color: white;
   background-color: #ff3936;
} 
    </style>

@endsection
@section('content')
<br> 

@if($buscarpor == "")

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
        <span id="oldprice31">S/{{$pro->price}} </span>
        <span id="price31"> S/{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}} </span>
        @else
        <span id="price31"> S/{{$pro->price}} </span>
        @endif
      </div>
      @endforeach
     
    </div>
  </div>


 <div class="miproducto">
    <div class="imagen">
    
    <div class="imagen2">
    <img class="productoimg" id="productoimg" src="../images/{{$producto[0]->image_path}}" alt="{{$producto[0]->producto}}" width="100%" height="400px">
    @if($producto[0]->oferta == 1 && $producto[0]->stock > 0)
      <div class="discount-label"> -{{$producto[0]->porcentajedescuento}}%</div>
    @endif
      @if( $producto[0]->stock == 0)
      <div class="agotado-label"> Sin Stock</div>
      @endif
      
    </div>
    <div class="imgsprod" id="imgsprod">
      @foreach($imagenes as $img)
      <a href="#" style="text-decoration: none; color: inherit;" onclick="mostrarimagen('{{$img->id}}', '{{$img->imagen}}')" data-imgid="{{$img->id}}" data-imgprod="{{$img->imagen}}" id="imgnro"> 
      <img class="prodimg" id="prodimg{{$img->id}}" src="../images/{{$img->imagen}}" alt="{{$img->imagen}}" width="100px" height="100px">
      </a>
      @endforeach
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
    <span class="enstock" > EN STOCK </span>
    @endif
    @if($producto[0]->stock == 0)
    <span class="sinstock"> SIN STOCK </span>
    @endif
    </h5>
    <br>
    
      @if($producto[0]->oferta == 1 && $producto[0]->stock > 0)
      <span class="disponible" >  PRECIO ANTES: &nbsp;</span>
      <span id="oldprice"> S/{{$producto[0]->price}} </span> &nbsp; <br>
      <span class="precioprod" >  PRECIO AHORA: &nbsp;</span>
      <span id="price"> S/{{number_format($producto[0]->price - (($producto[0]->price*$producto[0]->porcentajedescuento)/100), 2);}} </span>
      @else
      <span class="precioprod" >  PRECIO: &nbsp;</span>
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
  <br>
      <div class="inputcant">
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
         <br><br><br>
        <input class="inputcantidad" type="number" name="quantity" id="quantity" min="1" max="{{$producto[0]->stock}}" required>
        
        <a href="#" id="increment"> <span class="mas"> + </span>   </a>
        <a href="#" id="decrement">  <span class="menos"> - </span>  </a>
        

        <a href="#" title="añadir a la lista de deseos" class="btnlist"><i class="fa-solid fa-heart"></i></a>
        
        <button class="btncart" title="añadir al carrito">
          <i class="fa fa-shopping-cart"></i> AÑADIR AL CARRITO
        </button>
         


      </form>
      
      </div>
       
    </div>

   
    </div>

 </div>

 <div class="midescripcion">
 
  <h4 style="text-align: left;">Descripcion:</h4>
  <br><br>
  @foreach($descripcion as $desc)
  @php  $cont=0;      @endphp
  <div class="misdatos" style="display: flex; align-items: center;">
    <div class="descripcion" style="display: flex; align-items: center;">
        <h5>{{$desc->descripcion}}:</h5> 
    </div>  
    @foreach($especificacion as $esp)
    @if($desc->descripcion == $esp->descripcion)
      @php $cont = $cont + 1; @endphp
    @endif
    @endforeach
    @php  $cont2 = 0;      @endphp
    <div class="especificaciones">
    @foreach($especificacion as $esp)
    @if($desc->descripcion == $esp->descripcion)
    @php  $cont2 = $cont2 + 1 ;      @endphp
    <div class="especificacion">
        <h5>{{$esp->especificacion}}</h5> 
    </div>
    <div class="dato">
        <h5>{{$esp->dato}}</h5> 
    </div>
    @if($cont2 < $cont) 
      <hr>
    @endif
    @endif
    @endforeach   
    </div>
    </div>
    <hr>
    @endforeach
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

@endif

@if($buscarpor != "")

<div class="titulo2">

  <h3>Busqueda de Productos: {{$buscarpor}}</h3>

  <hr>
</div>
<div class="vista2">
 
  <div class="viewproductos2">

    @foreach($productosbusqueda as $pro)
    <div class="product2">
      <img src="../images/{{$pro->image_path}}" alt="Producto" width="100%" height="140px">
      @if($pro->oferta == 1 && $pro->stock > 0)
      <div class="discount-label2"> -{{$pro->porcentajedescuento}}%</div>
      @endif
      @if( $pro->stock == 0)
      <div class="agotado-label2"> Sin Stock</div>
      @endif
      <a href="/producto/{{ $pro->name }}" class="productname2 nombreproducto2">
                <h5 class="nombreproducto"> {{ $pro->name }} </h5>
      </a>
      @if($pro->oferta == 1 && $pro->stock > 0)
      <span id="oldprice21"> S/{{$pro->price}} </span> &nbsp;
      <span id="price21"> S/{{number_format($pro->price - (($pro->price*$pro->porcentajedescuento)/100), 2);}} </span>
      @else
      <span id="price21"> S/{{$pro->price}} </span>
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

        <a href="#" title="añadir a la lista de deseos" class="btnlist2"><i class="fa-solid fa-heart"></i></a>
        @if( $pro->stock == 0)
        <a href="/producto/{{ $pro->name }}" title="Ver Producto" class="btnver2">
          <p> &nbsp; <i class="fa-solid fa-eye"></i> VER PRODUCTO &nbsp;</p>
        </a>
        @else
        <button class="btncart2" title="añadir al carrito">
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
  $(document).ready(function() {
 
  document.getElementById("quantity").value = 1;

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

  });

  function mostrarimagen(id,imagen)  {

document.getElementById("productoimg").src ="../images/"+ imagen;

}
  

const increment = document.getElementById("increment");
const decrement = document.getElementById("decrement");
const input = document.getElementById("quantity");

increment.addEventListener("click", function() {
  
  if(parseInt(input.value)<parseInt(input.max)){
  input.value = parseInt(input.value) + 1;}
  if(parseInt(input.value)>parseInt(input.max)){
  input.value = parseInt(input.max)  ;}
});

decrement.addEventListener("click", function() {
  if(parseInt(input.value)>1){
  input.value = parseInt(input.value) - 1;}
  if(parseInt(input.value)>parseInt(input.max)){
  input.value = parseInt(input.max)  ;}
});

input.addEventListener("change", function() {
  
  if(parseInt(input.value)>parseInt(input.max)){
  input.value = parseInt(input.max)  ;}
  
});

 

</script>
@endsection