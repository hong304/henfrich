@extends('layouts.master')

@section('content')
@foreach ($products as $key => $product)
    <a href="{{URL::to('product_detail/'.$product['id'])}}">{{$product['name']}}</a>
@endforeach
@stop