<?php  require "config/config.php"; ?>
<?php  require "libs/App.php"; ?>  
<?php include_once "includes/header.php"; ?>


<?php

 if(isset($_POST['submit']))
 {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date_booking = $_POST['date_booking'];
        $num_people = $_POST['num_people'];
        $status = "pending";
        $special_req = $_POST['special_request'];
        $user_id = $_SESSION['user_id'];

        
       
       if($date_booking > date("m/d/Y h:i:sa"))
        {
            $query = "INSERT INTO `booking`(`name`,`email`,`date_booking`,`num_people`,`status`,`special_request`,`user_id`) VALUES(:name, :email, :date_booking, :num_people, :status, :special_request, :user_id)";

             $arr =[
                 ":name" => $name,
                 ":email" => $email,
                 ":date_booking" => $date_booking,
                 ":num_people" => $num_people,
                 ":status" => $status,
                 ":special_request" => $special_req,
                 ":user_id" => $user_id,
              ];

                    $path = "index.php"; 

                    //echo $user_id;
           
           $app = new App;
           $booked = $app->insert($query,$arr,$path);

           if($booked == true)
           {
            echo "<script>alert('tables booked successfully');</script>";
           }else
           {
            echo "<script>alert('Sorry ! tables not booked successfully');</script>";
           }

        }
        else
        {
          echo "<script>alert('invalid date! pick a date starting from tommorow');</script>";
          echo "<script>window.location.href='".$path."';</script>";
        }       
 }

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


        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Book A Table Online</h1>
                        
                         <form action="booking.php" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating date" id="date3" data-target-input="nearest">
    <input type="text" name="date_booking" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                            <label for="datetime">Date & Time</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                    <select class="form-select" id="num_people" name="num_people">
                              <option value="1"> 1</option>
                              <option value="2"> 2</option>
                              <option value="3"> 3</option>
                              <option value="4"> 4</option>
                              <option value="4"> 5</option>
                            </select>
                            <label for="select1">No Of People</label>
                          </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                 <textarea class="form-control" placeholder="Special Request" id="special_request" name="special_request" style="height: 100px"></textarea>
                            <label for="message">Special Request</label>
                        </div>
                    </div>

                    <input type="hidden" name="status" id="status">

                    <?php  if(isset($_SESSION['user_id'])) {  ?>  
                    <div class="col-12">
    <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Book Now
        </button>
                    </div>
                <?php }else{ ?>
<button type="submit" id="book_btn_error" class="btn btn-primary w-100 py-3">Book Now</button>
                <?php  } ?>

                </div>
            </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- Reservation Start -->
        

        <!-- Footer Start -->
        <?php require "includes/footer.php"; ?>