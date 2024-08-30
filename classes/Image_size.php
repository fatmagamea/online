<?php
namespace Route\online\classes;
use Route\online\classes\validator;
require_once "Validator.php";
class Image_size implements Validator {
    public function check($key,$value){
        
        if ($value>1){
return "size must be less than 1";
        }
        else{
            return "false";
        }
    }
}