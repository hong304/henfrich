<?php

class ProductController extends BaseController {

    public function getProductList($type) {

       $products = Colour::with(array('productdetail' => function($q) use ($type){
               $q->where('type',$type);
           }))->get();
        $products = Productdetail::where('type',$type)->with('colours')->get();

        $tags = Tag::all();
        return View::make('Product_list')->with('products',$products)->with('tags',$tags);
    }

    public function getProductDetail($id){
        $productdetail = Productdetail::find($id)->with('colours')->first();
       // p($productdetail);die;
        return View::make('product_detail')->with('productdetail',$productdetail);
    }

    public function postProductFilter(){
        $input = Input::all();
        $count = count($input);


        if($count == 1){
              return $this->getProductList('shirt');
        }else{
            $count = count($input['tag']);

    }
        $results=  Productdetail::whereHas('tags',function($q) use ($input) {
            $q->whereIn('name',$input['tag']);
        },'=',$count)->get();

        $tags = Tag::all();
        return View::make('Product_list')->with('products',$results)->with('tags',$tags)->with('tag_checked',$input['tag']);
    }
}

