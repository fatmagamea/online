<?php
namespace Route\online\classes;
require_once "Required.php";
require_once "Str.php";
require_once "Numper.php";
require_once "Image_ext.php";
require_once "Image_size.php";
class Validation{
private $errors=[];
public function lastvalidate($key ,$value,$rules){
foreach ($rules as $rule)
$rule= "Route\online\classes\\".$rule;
$obj= new $rule;
$result=$obj->check($key,$value);
if ($result!=false){
    $this->errors[]=$result;
}
}
public function geterror(){
    return $this->errors;
}

}