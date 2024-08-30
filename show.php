<?php include 'inc/header.php'; 
require_once "app.php";?>




<div class="container my-5">

    <div class="row">
<?php
if ($request->get('id')){
    $id=$request->get('id');
    $result=$conn->prepare("select * from products where id=:id");
$result->bindParam(":id",$id);
$result->execute();
if($result->rowCount()==1){
    $product=$result->fetch(PDO::PARAM_STR);


}
else{$request->redirect("index.php");
    $session->set("errors",["product not found"]);

}
}


if (!empty($product)){?>

    <div class="col-lg-6">
            <img src="images/<?php echo $product['image'] ?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?php echo $product['name'] ?></h5>
            <p class="text-muted"><?php echo $product['price'] ?></p>
            <p><?php echo $product['descripation'] ?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
            <a href="handeldelet.php?id<?php echo $product['id'] ?>" class="btn btn-danger">Delete</a>
        </div>
        
    </div>

<?php }
else{
    echo "product not found";
}?>

</div>



<?php include 'inc/footer.php'; ?>