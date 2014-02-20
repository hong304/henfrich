@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xs-2">
{{Form::open(array('action'=>'ProductController@postProductFilter'))}}
        <div class="form-group">

        <label for="PATTERN" class="control-label">PATTERN:</label>
        @foreach ($tags as $key => $tag)
            @if($tag->type == 'PATTERN')
                <div class="checkbox">
                    <label><input type="checkbox" value="{{$tag->name}}" name="tag[pattern]" <?if(isset($tag_checked['pattern'])) if($tag->name == $tag_checked['pattern'])echo "checked";?> />{{$tag->name}}</label>
                </div>
            @endif
        @endforeach
        <p>
         <br>
            <label>BRAND:</label>
            @foreach ($tags as $key => $tag)
            @if($tag->type == 'BRAND')
            <div class="checkbox">
                <label><input type="checkbox" value="{{$tag->name}}" name="tag[brand]" <?if(isset($tag_checked['brand'])) if($tag->name == $tag_checked['brand'])echo "checked";?>  />{{$tag->name}}</label>
            </div>
            @endif
            @endforeach
            </p>
            <br>
            <p>
            <label>FABRIC:</label>
            @foreach ($tags as $key => $tag)
            @if($tag->type == 'FABRIC')
            <div class="checkbox">
                <label><input type="checkbox" value="{{$tag->name}}" name="tag[fabric]" <?if(isset($tag_checked['fabric'])) if($tag->name == $tag_checked['fabric'])echo "checked";?>  />{{$tag->name}}</label>
            </div>
            @endif
            @endforeach
            </p>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        {{Form::close()}}
    </div>

    <div class="col-xs-10">



      @foreach ($products as $key => $product)
        <div class="row-fluid">
        <div class="col-xs-2 pull-left">
<div class="shirt">
        <a href="{{URL::to('product_detail/'.$product['id'])}}">{{$product['name']}}</a>
</div>
          <div class="colour">
          @foreach ($product->colours as $x)
            {{$x['name']}}
          @endforeach
          </div>
        </div>
            </div>
        @endforeach




     </div>

    </div>
@stop

@section('footer')
<script>
    $("input:checkbox").click(function() {
        if ($(this).is(":checked")) {
            var group = "input:checkbox[name='" + $(this).attr("name") + "']";
            $(group).prop("checked", false);
            $(this).prop("checked", true);
        } else {
            $(this).prop("checked", false);
        }
    });
</script>
@stop