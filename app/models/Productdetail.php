<?
class Productdetail extends Eloquent {

    public function tag(){
        return $this->belongsToMany('Tag')->withTimestamps();
    }

    public function cartItem(){
        return $this->hasMany('CartItem');
    }

    public function orderItem(){
         return $this->hasMany('OrderItem');
    }

}