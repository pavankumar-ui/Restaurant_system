<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){

    echo "<script>window.location.href='".APPURL."';</script>";
    exit;
}
?>


<?php


           $query = "DELETE from cart WHERE user_id = '$_SESSION[user_id]'";

           $app = new App;
            $path= "cart.php";
           $delete = $app->delete($query,$path);

           if($delete == true)
           {
           	echo "deleted successfully with ordered user";
           }
           else
           {
           	 echo "not deleted successfully with ordered user";
           }

      ?>


      <?php require "../includes/footer.php"; ?>