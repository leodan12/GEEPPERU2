@if(count(\Cart::getContent()) > 0)
@foreach(\Cart::getContent() as $item)
<li>

    <img src="images/{{ $item->attributes->image }}" style="width: 50px; height: 50px;  "> 
    <b>{{$item->name}}</b>
    <br><small>Qty: {{$item->quantity}}</small>

    <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>

</li>
@endforeach
 
<li>

    <b>Total: </b>${{ \Cart::getTotal() }}

    <form action="{{ route('cart.clear') }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
    </form>

</li>
<br>
 
    <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
        CARRITO <i class="fa fa-arrow-right"></i>
    </a>
    <a class="btn btn-dark btn-sm btn-block" href="">
        CHECKOUT <i class="fa fa-arrow-right"></i>
    </a>

    @else
    <li  >Tu carrito esta vacío</li>
    @endif
 