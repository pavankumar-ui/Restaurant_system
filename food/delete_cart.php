<?php

require "../config/config.php";
require "../libs/App.php"; 


if(!isset($_SERVER['HTTP_REFERER'])){

    echo "<script>window.location.href='".APPURL."';</script>";
    exit;
}



if(isset($_POST['delete_cart_btn']))
{
        $id= $_POST['cart_id'];
           $query = "DELETE from cart WHERE id ='$id'";

           $app = new App;

           $path= "cart.php";
           $delete = $app->delete($query,$path);


          if($delete == true){
          	echo "cart item deleted successfully";
               

          }else
          {
          	echo "failed to delete cart item";
          }
}else
     {

          echo '<script>window.location.href="'.APPURL.'/404_error.php";</script>';

     }




?>

