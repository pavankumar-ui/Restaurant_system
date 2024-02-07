<?php  require "../config/config.php"; ?>
<?php  require "../libs/App.php"; ?>  
<?php require "../includes/header.php"; ?>



<?php
    if(!isset($_SESSION['user_id'])){
    echo "<script>window.location.href='".APPURL."';</script>";
    exit;
   }

error_reporting(0);
    $user_id = $_SESSION['user_id'];
     $query = "SELECT * from booking where user_id='$user_id'";
      $app = new App;
     $bookings = $app->selectAll($query);

?>


<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Bookings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>



 <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" class="text-info">Name </th>
                            <th scope="col" class="text-info">Email</th>
                            <th scope="col" class="text-info">Date Of Booking</th>
                            <th scope="col" class="text-info">No. of Peoples</th>
                            <th scope="col" class="text-info">Reason</th>
                            <th scope="col" class="text-info">Status</th>
                          
                            <th scope="col" class="text-info">Review</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                         
                  
                      
                         <?php foreach($bookings as $booking){ ?>

                          <tr>
                            
                            <td><?php  echo $booking->name; ?> </td>
                            <td><?php  echo $booking->email; ?></td>
                            <td><?php  echo $booking->date_booking; ?></td>
                            <td><?php  echo $booking->num_people; ?></td>
                            <td><?php  echo $booking->special_request; ?></td>
                            <td><?php  echo $booking->status; ?></td>
                            
                               <?php if($booking->status == "confirmed"){  ?>
                             <td>
                                <a href="<?php echo APPURL; ?>/users/review.php" role="button" class="btn btn-success text-white">Review Us</a>
                            </td>
                              <?php } ?>
                                         

                          </tr>
                         <?php   }  ?>
                          

                        </tbody>
                      </table>
                      
                </div>
            </div>
        <!-- Service End -->





<?php require "../includes/footer.php"; ?>