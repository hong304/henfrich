<?
class Order extends Eloquent {

    public function orderItem(){
        return $this->hasMany('OrderItem');
    }

    public function user(){
        return $this->belongsTo('User');
    }
}