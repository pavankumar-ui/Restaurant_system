<?php
require "./../../config/config.php";
       require "./../../libs/App.php";

if(isset($_POST['delete_book_btn'])){

$b_id = $_POST['b_id'];

 $query = "DELETE from booking where id='$b_id'";

 $app = new App;
//$app->validateAdminSession();
$path = "show-bookings.php";
$delete = $app->delete($query,$path);

if($delete == true)
{
       echo "booking deleted successfully";
}else
{
       echo "deletion failed";
}


}





?>