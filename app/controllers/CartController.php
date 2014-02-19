<?php

class CartController extends BaseController {

    public function getCart(){
     // $carts = Productdetail::with('cartitem')->get();
        $carts = CartItem::with('productdetail')->where('session_id',Session::get('session_id'))->get();

       // p($carts);die;
       return View::make('cart')->with('carts',$carts);
    }

    public function getCartRemove($id){
        CartItem::where('session_id',Session::get('session_id'))->where('productdetail_id',$id)->delete();
            return $this->getCart();
        }

    public function postAddToCart() {

        if(Auth::check()){
            Session::put('session_id',  Auth::user()->id);
        }else{
            session_start();
            Session::put('session_id', session_id());
        }

        $input = Input::all();

        $rules = array(
            'id' => 'required|exists:productdetails,id',
            'qty' => 'required|numeric',
            'collar' => 'required',
            'cuff' => 'required',
            'pocket' => 'required',
            'pleat' => 'required',
            'monogram_name' => 'max:3'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()){
            return Redirect::route('product_detail',$input['id'])->withErrors($validator)->withInput();
    } else {
            $product = Productdetail::find($input['id']);

            $c = CartItem::where('session_id',Session::get('session_id'))->where('productdetail_id',$input['id'])->first();
            if(!$c){
                $c = New CartItem;
                $c->session_id=Session::get('session_id');
                $c->productdetail_id=$input['id'];
            }
            $c->qty=$input['qty'];
            $c->price= $input['qty']*$product['price'];
            $c->collar=$input['collar'];
            $c->cuff=$input['cuff'];
            $c->pocket=$input['pocket'];
            $c->pleat=$input['pleat'];
            $c->monogram_name=$input['monogram_name'];

            $c->save();

           return Redirect::To('cart');
        }
    }

}

