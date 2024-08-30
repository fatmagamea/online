<?php include 'inc/header.php';
require_once "app.php";
?>
<?php
if ($request->get('id')){
    $id=$request->get('id');
    $result=$conn->prepare("select * from products where id=:id");
$result->bindParam(":id",$id);
$result->execute();
if($result->rowCount()==1){
    $product=$result->fetch(PDO::PARAM_STR);
}
else {$request->redirect("index.php");
    $session->set("errors",["product not found"]);

}
}?>

<div class="container my-5">
    <?php require_once "inc/errors.php";
    ?>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">


            <form   method= "POST"   action ="handlers/edit.php?id<?php echo $product['id']?>">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="img">
                </div>

                <div class="col-lg-3">
                        <img src="images/1.jpg" class="card-img-top">
                        </div>
                        
                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>