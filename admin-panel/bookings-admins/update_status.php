<?php
require "./../../config/config.php";
       require "./../../libs/App.php";
        require "../layouts/header.php";
        require "../layouts/navbar.php";
?>

<?php

if(isset($_GET['b_id']))
       {
         $b_id=$_GET['b_id'];

           if(isset($_POST['update']))
          {
     
       
       
                     $status = $_POST['status'];
          $query ="UPDATE booking SET status= :status WHERE id= :b_id";

                    $arr = [
                           ':status' => $status,
                            ':b_id' =>$b_id,
                            ];

       $path = "show-bookings.php";

       $app = new App;
     $update=$app->update($query,$arr,$path);

     echo "<script>window.location.href='".$path."';</script>";

     //print_r($update);

     if($update == true){
       echo "<script>alert('Status updated');</script>";
     }else
     {
        echo "<script>alert('Status not  updated');</script>";
     }
 }

}
?>

<div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Update Bookings</h5>
           
           <form method="POST">
              <input type="text" class="b_id" value="<?php echo $b_id; ?>" name="b_id"/>

           <div class="form-group">
         <label for="exampleFormControlSelect1">Change Status</label>
           <select class="form-control status"   name="status">
      <option>-------Select Status-------</option>
      <option value="pending">pending</option>
      <option value="confirmed">confirmed</option>
      <option value="done">done</option>
    </select>
  </div>
  <input type="submit" name="update" value="update" class="btn btn-primary update_status"/>       

</form>



       </div>
           </div>
               </div>
                   </div>
            </div>


             <?php require "../layouts/footer.php"; ?>