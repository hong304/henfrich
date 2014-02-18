@foreach ($carts as $key => $cart)
      <a href="{{URL::to("cart_remove/".$cart['productdetail_id'])}}">{{$cart['productdetail']['name']}}</a> {{$cart['qty']}}<br />
@endforeach
<a href="{{URL::to('product_list')}}">Product List</a>
<a href="{{URL::to('checkout')}}">Checkout</a>