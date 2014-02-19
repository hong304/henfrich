{{ Form::open(array('action' => 'CartController@postAddToCart')) }}
{{$productdetail['name']}}<br/>

Collar:<br/>
@foreach (Tab::collar() as $v)
    {{Form::radio('collar', $v, ($productdetail->collar == $v) ? true : false ) }} {{$v}}<br>
@endforeach
{{ $errors->first('collar') }}
<br />
Cuff:<br/>
@foreach (Tab::cuff() as $v)
{{Form::radio('cuff', $v, ($productdetail->cuff == $v) ? true : false ) }} {{$v}}<br>
@endforeach
{{ $errors->first('cuff') }}
<br />
Pocket:<br/>
@foreach (Tab::pocket() as $v)
{{Form::radio('pocket', $v, ($productdetail->pocket == $v) ? true : false ) }} {{$v}}<br>
@endforeach
{{ $errors->first('pocket') }}
<br />
Pleat:<br/>
@foreach (Tab::pleat() as $v)
{{Form::radio('pleat', $v, ($productdetail->pleat == $v) ? true : false ) }} {{$v}}<br>
@endforeach
{{ $errors->first('pleat') }}

<br/>
<div class="control-group {{{ $errors->has('qty') ? 'error' : '' }}}">
    {{ Form::label('monogram_name', 'Monogram Text', array('class' => 'control-label')) }}
    <div class="controls">
        {{ Form::text('monogram_name', Input::old('monogram_name')) }}
        {{ $errors->first('monogram_name') }}
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


