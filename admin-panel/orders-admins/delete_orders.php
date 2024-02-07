<?php
require "./../../config/config.php";
       require "./../../libs/App.php";

if(isset($_POST['delete_order_btn']))
{
          $o_id = $_POST['o_id'];

       $query = "DELETE from orders where o_id='$o_id'";

    $app = new App;
    //$app->validateAdminSession();
  $path = "show-orders.php";
   $delete = $app->delete($query,$path);

   if($delete ==true)
   {
       echo "food data deleted successfully";
   }else
   {
       echo "query error";
   }

}


?>