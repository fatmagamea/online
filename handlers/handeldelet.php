<?php
require_once "../app.php";
if($request->check($request->post('submit'))&& $request->check($request->get('id'))){
$id=$request->get('id');
$result=$conn->prepare("select * from products where id=:id");
    $result->bindParam(":id",$id);
    $result->execute();
    if($result->rowCount()==1){
       
        $result=$conn->prepare("delete from products  where id=:id") ;
        $result->bindParam(":id",$id);
        $result->execute();
    
        
        if($result){
    $request->redirect("../index.php");
    $session->set("success","product deleted sucessfully");

}
else{
    $request->redirect("../index.php");
    $session->set("errors",["error while deleted"]);
}

}
else{
    $request->redirect("../index.php");
    $session->set("errors",["product not found"]);
}
}
else{
    $request->redirect("../index.php");
    $session->set("errors",["product not found"]);
}