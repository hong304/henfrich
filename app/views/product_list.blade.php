@foreach ($products as $key => $product)
    <a href="product_detail/{{$product['id']}}">{{$product['name']}}</a>
@endforeach