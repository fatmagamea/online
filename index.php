<?php 
require_once 'inc/header.php';
require_once 'app.php';
?>



<div class="container my-5">
<?php

require_once "inc/sucess.php"
?>

    <div class="row">
        


<?php
$result=$conn->query("SELECT * FROM `products`");
if ($result->rowcount()>0){
    $products=$result->fetchall();

}

else{
    $msg="products not found";
}
if (!empty($products)){
foreach ($products as $product){ ?>


<div class="col-lg-4 mb-3">



<div class="card">
<img src="images/<?php echo $product['image']?>" class="card-img-top">
<div class="card-body">
<h5 class="card-title"><?php echo $product['name']?></h5>
<p class="text-muted"><?php echo $product['price']?></p>
<p class="card-text"><?php echo $product['descripation']?></p>
<a href="show.php?id=<?php echo $product ['id']?>" class="btn btn-primary">Show</a>

<a href="edit.php?id=<?php echo $product ['id']?>" class="btn btn-info">Edit</a>
<a href="handlers\handeldelet.php?id=<?php echo $product ['id']?>" class="btn btn-danger">Delete</a>

</div>
</div>

</div>


<?php }


}

else{
    echo "products 2not found";
}

?>
<?php



?>
    
        
    </div>

</div>



<?php include 'inc/footer.php'; ?>