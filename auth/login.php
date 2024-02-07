<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php

$app = new App;

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

$query = "SELECT * from users WHERE email='$email'";

$data =[
          "email" =>$email,
          "password" =>$password,

      ];

   $path = "../index.php";
      $login = $app->login($query,$data,$path);
 }
?>


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Login</h5>
                        <h1 class="text-white mb-4">Login</h1>
                        
                        <form class="col-md-12" method="POST" action="login.php">
                            <div class="row g-3">
                               
                                <div class="">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="email" placeholder="Your Email" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                               
                               
                               
                                 <div class="col-md-12">
                <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
       <?php require "../includes/footer.php"; ?>