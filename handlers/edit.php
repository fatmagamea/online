<?php
require_once "../app.php";
if($request->check($request->post('submit')) && $request->check($request->get('id'))){
$id=$request->get('id');

$name=$request->clean($request->post("name"));

$descripation=$request->clean($request->post("desc"));
$price=$request->clean($request->post("price"));

if ($request->check($request->file("image"))){

$image=$_FILES["image"];
$image_name=$image['name'];
$image_tempname=$image['tmp_name'];
$image_error=$image['error'];
$ext=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
$image_size=$image['size']/(1024*1024);
    
$new_name=uniqid()."." .$ext;
}
else{
    echo "error1";
    $request->redirect("../edit.php");
}
$errors=[];
$validation->lastvalidate($name,"name",["Required","Str"]);
$errors[]=$validation->geterror();
$validation->lastvalidate($price,"price",["Required","Number"]);
$errors[]=$validation->geterror();
$validation->lastvalidate($descripation,"desc",["Required","Str"]);
$errors[]=$validation->geterror();

$validation->lastvalidate($image_size,$image['size']/(1024*1024),["Image_size"]);
$errors[]=$validation->geterror();
$validation->lastvalidate($ext,strtolower(pathinfo($image_name,PATHINFO_EXTENSION)),["Image_ext"]);
$errors[]=$validation->geterror();
if(empty($errors)){

    $result=$conn->prepare("select * from products where id=:id");
    $result->bindParam(":id",$id);
    $result->execute ();
    if($result->rowCount()==1){
       
        $result=$conn->prepare("update  products set `name`=:name,`price`=:price,`descripation`=:descripation,`image`=:$new_name where id=$id") ;
        $result->bindParam(":id",$id);
        $result->bindParam(":name",$name);

        $result->bindParam(":price",$price);
        
        $result->bindParam(":descripation",$descripation);
        $result->bindParam(":$new_name",$image);
       $result= $result->execute();
if($result){
    $request->redirect("../index.php");
    $session->set("success","product updated sucessfully");

}
else{
    $request->redirect("../index.php");
    $session->set("errors",["error while updated"]);
}
}
else{
    $request->redirect("../index.php");
    $session->set("errors",["product not found"]);


}



}
else{
    $request->redirect("../edit.php?id=$id");
    $session->set("errors",$errors);

}

}
else{
$request->redirect("../edit.php");
echo "err2";
}
