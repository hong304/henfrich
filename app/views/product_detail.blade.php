{{ Form::open(array('action' => 'CartController@postAddToCart')) }}
{{$productdetail['name']}}<br/>
qty:{{ Form::text('qty')}}
{{Form::hidden('id',$productdetail['id'])}}
{{ Form::submit('Click Me!')}}
{{ Form::close() }}


