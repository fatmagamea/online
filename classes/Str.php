<?php
namespace Route\online\classes;
use  Route\online\classes\Validator;
require_once "Validator.php";
class Str {
    public function check($key,$value){
        if (is_numeric($value)){
return "$key must be string";
        }
        else{
            return "false";
        }
    }
}