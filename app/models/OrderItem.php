<?
class OrderItem extends Eloquent{

    public function productdetail(){
        return $this->belongsTo('Productdetail');
    }

    public function order(){
        return $this->belongsTo('Order');
    }
}