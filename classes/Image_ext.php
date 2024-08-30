<?php
namespace Route\online\classes;
use Route\online\classes\validator;
require_once "Validator.php";
class Image_ext implements Validator {
    public function check($key,$value){
        
        if (!in_array($value,["jpg","png","jpeg"])){
return "incorrect extension";
        }
        else{
            return "false";
        }
    }
}