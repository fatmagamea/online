<?php
 namespace Route\online\classes;
 class Request {

public function get ($key ){

if (isset($_GET[$key])){
return $_GET[$key];
}
else {
    return "key not found";
}

 }
 public function post ($key){

    if (isset($_POST[$key])){
   return $_POST[$key];
    }
    else {
        return "key not found";
    }
    
     }
     public function file($key){

        if (isset($_FILES[$key])){
       return $_files[$key]&& $_FILES[$key]['name'];
        }
        else {
            return "key not found";
        }
        
         }

public function check ($data){
    return isset($data);
    
}

public function clean ($data){
    return trim (htmlspecialchars($data));
    
}


public function redirect($file){
header("location:$file");}


}