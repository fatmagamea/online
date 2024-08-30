

<?php
require_once "../app.php";
if ($request->check($request->post("submit"))){
$name=$request->clean($request->post("name"));

$descripation=$request->clean($request->post("desc"));
$price=$request->clean($request->post("price"));

if ($request->check($request->file("image"))){

$image=$_FILES['image'];
$image_name=$image['name'];
$image_tempname=$image['tmp_name'];
$image_error=$image['error'];
$ext=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
$image_size=$image['size']/(1024*1024);
    
$new_name=uniqid()."." .$ext;
}
else{
    $request->redirect("../add.php");
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
 if (empty($errors)){
 $runquery=$conn->prepare("insert into products(`name`,`price`,`descripation`,`image`) values(':name',':price',':descripation',':$new_name')");
$runquery->bindParam(":name",$name,PDO::PARAM_STR);

$runquery->bindParam(":price",$price,PDO::PARAM_STR);

$runquery->bindParam(":descripation",$descripation,PDO::PARAM_STR);
$runquery->bindParam(":$new_name",$image,PDO::PARAM_STR);

$result=$runquery->execute();
if ($result){

    if ($request->check($request->file("image"))){
        move_uploaded_file($image_tempname,"../images/$new_name");
    }
    $session->set("success","data inserted successfully");
    $request->redirect("../index.php");
}
else{
    $session->set("errors",["error while inserted "]);
    $request->redirect("../add.php");

}

}
else{
$session->set("errors",$errors);

$request->redirect("../add.php");
}
}

else{
    $request->redirect("../add.php");
}