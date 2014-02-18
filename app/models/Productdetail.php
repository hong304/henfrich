<?
class Productdetail extends Eloquent {

    public function cartItem(){
        return $this->hasMany('CartItem');
    }

    public function orderItem(){
    return $this->hasMany('OrderItem');
}
}