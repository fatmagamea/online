<?php
namespace Route\online\classes;
use  Route\online\classes\Validator;
require_once "Validator.php";
class Required implements Validator {
    public function check($key,$value){
        if(!empty($value)){
return 
"$key is required";
        }
        else{
            return "false";
        }
    }
}