<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php


$app = new App;

if(isset($_POST['submit']))
{


     $username=$_POST['username'];
     $email=$_POST['email'];
     $password=password_hash($_POST['password'], PASSWORD_DEFAULT);



$query= "INSERT INTO `users`(`username`,`email`,`password`) VALUES(:username, :email, :password)";


     $arr=[

              ":username" => $username,
              ":email" => $email,
              ":password" => $password,
         ];  


         $href = "login.php";
 $app->register($query,$arr,$href);
 
}else
{

echo "fields should not be empty";

}





?>


        <!-- Service Start -->
            <div class="container">
                
    <div class="col-md-12 bg-dark">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>

            <h1 class="text-white mb-4">Register for a new user</h1>
                  
                  <span id="allerr" class="text-danger error"></span>

            <form class="col-md-12" method="POST" action="register.php">
                <div class="row g-3">
                    <div class="">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" name="username" id="username">
                            <label for="name">Username</label>

                            <span id="usernameerr" class="text-danger error"></span>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" id="email">
                            <label for="email">Your Email</label>
                            <span id="emailerr" class="text-danger error"></span>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Your Password" name="password">
                            <label for="password">Password</label>
                            <span id="passworderr" class="text-danger error"></span>
                        </div>
                    </div>
                   
                   
                   
                    <div class="col-md-12">
<button  name="submit" class="btn btn-primary w-100 py-3" type="submit" id="checkfields">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Service End -->


        <?php require "../includes/footer.php"; ?>