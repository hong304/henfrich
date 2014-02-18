<?
class CartItem extends Eloquent{
    public function productdetail(){
        return $this->belongsTo('Productdetail');
    }
}