<?php

class ProductController extends BaseController {

    public function getProductList() {
         $products = Productdetail::all();

        return View::make('product_list')->with('products',$products);
    }

    public function getProductDetail($id){
        $productdetail = Productdetail::find($id);
        return View::make('product_detail')->with('productdetail',$productdetail);
    }
}

