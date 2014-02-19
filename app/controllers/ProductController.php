<?php

class ProductController extends BaseController {

    public function getProductList($type) {
         $products = Productdetail::where('type',$type)->get();

        return View::make('Product_list')->with('products',$products);
    }

    public function getProductDetail($id){
        $productdetail = Productdetail::find($id);
        return View::make('product_detail')->with('productdetail',$productdetail);
    }
}

