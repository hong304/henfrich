@extends('layouts.master')
@section('content')
{{ Form::open(array('action' => 'CartController@postAddToCart')) }}
<label>{{$productdetail->name}}</label><br/>

Colour:<br>
@foreach($productdetail->colours as $colour)
{{$colour->name}},
@endforeach
<br /><br />
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Collar</a></li>
        <li><a href="#tabs-2">Cuff</a></li>
        <li><a href="#tabs-3">Pocket</a></li>
        <li><a href="#tabs-4">Pleat</a></li>
        <li><a href="#tabs-5">Monogram</a></li>

    </ul>
    <div id="tabs-1">
        @foreach (Tab::collar() as $v)
        {{Form::radio('collar', $v, ($productdetail->collar == $v) ? true : false ) }} {{$v}}<br>
        @endforeach
        {{ $errors->first('collar') }}
    </div>
    <div id="tabs-2">
        @foreach (Tab::cuff() as $v)
        {{Form::radio('cuff', $v, ($productdetail->cuff == $v) ? true : false ) }} {{$v}}<br>
        @endforeach
        {{ $errors->first('cuff') }}</div>
    <div id="tabs-3">
        @foreach (Tab::pocket() as $v)
        {{Form::radio('pocket', $v, ($productdetail->pocket == $v) ? true : false ) }} {{$v}}<br>
        @endforeach
        {{ $errors->first('pocket') }}</div>
    <div id="tabs-4">
        @foreach (Tab::pleat() as $v)
        {{Form::radio('pleat', $v, ($productdetail->pleat == $v) ? true : false ) }} {{$v}}<br>
        @endforeach
        {{ $errors->first('pleat') }}

    </div>
    <div id="tabs-5">
        <div class="control-group {{{ $errors->has('qty') ? 'error' : '' }}}">
            {{ Form::label('monogram_name', 'Monogram Text', array('class' => 'control-label')) }}
            <div class="controls">
                {{ Form::text('monogram_name', Input::old('monogram_name')) }}
                {{ $errors->first('monogram_name') }}
            </div>
        </div>
    </div>
</div>




<div class="control-group {{{ $errors->has('qty') ? 'error' : '' }}}">
    {{ Form::label('qty', 'Qty', array('class' => 'control-label')) }}
    <div class="controls">
        {{ Form::text('qty', Input::old('qty')) }}
        {{ $errors->first('qty') }}
    </div>
</div>


{{Form::hidden('id',$productdetail['id'])}}
{{ Form::submit('Add to cart')}}
{{ Form::close() }}

@stop

@section('footer')
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>
@stop
