<?php
require_once "app.php";
if ($session->get('success')){
    
?>
<div class="alert alert-success"> <?php
echo $session->get('success');?>

    </div>
   <?php }

$session->remove('success');