<?
class Tab extends Eloquent {

    static function collar(){
       return [
            'Forward Point','Button-Down','Spread','English Spread','Curved Spread','Cutaway'
        ];
    }

    static function cuff(){
        return ['French (square)','French (cut)','Single Button (rounded)','Single Button (Cut)','Double Button (rounded)','Double Button (Cut)'];
    }

    static function pocket(){
        return [
            'No pocket','Single Pocket'
        ];
    }

    static function pleat(){
        return [
            'No pleat', 'Box', 'Side'
        ];
    }
}