<?
class Colour extends Eloquent {

    public function productdetail(){
        return $this->belongsToMany('Productdetail')->withTimestamps();
    }

}
