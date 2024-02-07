<?php
require "./../../config/config.php";
       require "./../../libs/App.php";

if(isset($_POST['delete_food_btn']))
{
          $f_id = $_POST['f_id'];

       $query = "DELETE from foods where f_id='$f_id'";

    $app = new App;
    //$app->validateAdminSession();
  $path = "show-foods.php";
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