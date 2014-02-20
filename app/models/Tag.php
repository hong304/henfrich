<?
class Tag extends Eloquent {

    public function productdetail(){
        return $this->belongsToMany('Productdetail')->withTimestamps();
    }

}
