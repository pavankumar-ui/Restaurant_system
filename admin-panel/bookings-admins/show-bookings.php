<?php 

      require "./../../config/config.php";
       require "./../../libs/App.php";
        require "../layouts/header.php";
        require "../layouts/navbar.php";

        $app = new App;
$app->validateAdminSession();

$query = "SELECT * from booking";

$bookings =$app->selectAll($query);


?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">date_booking</th>
                    <th scope="col">num_people</th>
                    <th scope="col">special_request</th>
                    <th scope="col">status</th>
                    <th scope="col">Change Status</th>
                    <th scope="col">created_at</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($bookings as $booking) { ?>
                  <tr>
            <th scope="row" class="b_id"><?php echo $booking->id; ?></th>
                    <td><?php echo $booking->name; ?></td>
                    <td><?php echo $booking->email; ?></td>
                    <td><?php echo $booking->date_booking; ?></td>
                    <td><?php echo $booking->num_people; ?></td>
                    <td><?php echo $booking->special_request; ?></td>
                    <td><?php
                     
                          if($booking->status == "pending"){ ?>
                        
                           <div class="text-danger"><b><?php echo $booking->status; ?></b></div>   
                          <?php }else if($booking->status == "confirmed")
                            { ?>
                            <div class="text-info"><b><?php echo $booking->status; ?></b></div>
                           <?php  }else { ?>
                              <div class="text-success"><b><?php echo $booking->status; ?></b></div>
                           <?php }  ?></td>
                    <td><!-- Button trigger modal -->
<a href="update_status.php?b_id=<?php echo $booking->id; ?>" type="submit" class="btn btn-primary" role="button">
  Status
</a>

</td>
              <td><?php echo $booking->created_at; ?></td>
        <td><a class="btn btn-danger text-white delete_booking_btn">delete</a></td>
            </tr>
            <tr>
      <?php } ?>
                    
                </tbody>
              </table> 



           <?php require "../layouts/footer.php"; ?>