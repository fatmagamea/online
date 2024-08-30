<?php
namespace Route\online\classes;
use  Route\online\classes\Validator;
require_once "Validator.php";
class Number{
    public function check($key,$value){
        if (is_string($value)){
return "$key must be number";
        }
        else{
            return "false";
        }
    }
}