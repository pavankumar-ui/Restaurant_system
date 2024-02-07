<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php 

if(!isset($_SERVER['HTTP_REFERER'])){

    echo "<script>window.location.href='http://localhost/Restaurant_system/index.php';</script>";
    exit;
}


?>


<?php   

if(isset($_POST['submit']))
{
     $name= $_POST['name'];
     $email= $_POST['email'];
     $town = $_POST['town'];
     $country = $_POST['country'];
     $zipcode= $_POST['zipcode'];
     $phone_number= $_POST['phone_number'];
     $address = $_POST['address'];
     $total_price= $_SESSION['total_price'];
     $user_id = $_SESSION['user_id'];


     $query = "INSERT INTO `orders` (`name`,`email`,`town`,`country`,`zipcode`,`phone_number`,`address`,`total_price`,`user_id`) VALUES(:name, :email, :town, :country, :zipcode, :phone_number, :address, :total_price, :user_id)";

     $app = new App;

        $arr =[  ":name" =>  $name,
                  ":email" => $email,
                  ":town" =>  $town,
                  ":country" => $country,
                  ":zipcode" => $zipcode,
                  ":phone_number" => $phone_number,
                  ":address" => $address,
                  ":total_price" => $total_price,
                   ":user_id" =>  $user_id,
              ];

              $path = "pay.php";

  $result=   $app->insert($query,$arr,$path);

  if($result ==true)
  {
      echo "<script>alert('Ordered successfully')</script>";
  }else
  {
      echo "<script>alert('failed to order !')</script>";
  }


}




?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
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
                
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
<h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Checkout</h1>
                       

                 <form  class="col-md-12" method="POST" action="checkout.php">
                            <div class="row g-3">
                                
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
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
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="email" placeholder="Town" name="town">
                                        <label for="email">Town</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="country" placeholder="Country" name="country">
                                        <label for="text">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="zipcode" placeholder="Zipcode" name="zipcode">
                                        <label for="text">Zipcode</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone_number" placeholder="Phone number" name="phone_number">
                                        <label for="text">Phone number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Address" id="message"  name="address" style="height: 100px"></textarea>
                                        <label for="message">Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit"type="submit">Order and Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        <!-- Service End -->
        

       <!-- Footer Start -->
        <?php require "../includes/footer.php"; ?>