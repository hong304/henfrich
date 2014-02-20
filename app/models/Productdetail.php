<?
class Productdetail extends Eloquent {

    public function tags(){
        return $this->belongsToMany('Tag')->withTimestamps();
    }

    public function colours(){
        return $this->belongsToMany('Colour')->withTimestamps();
    }

    public function cartItem(){
        return $this->hasMany('CartItem');
    }

    public function orderItem(){
         return $this->hasMany('OrderItem');
    }

}