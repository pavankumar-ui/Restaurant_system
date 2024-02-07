
<?php 
      require "../../config/config.php";
       require "../../libs/App.php";
        require "../layouts/header.php";
?>

<?php

$app = new App;


if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

$query = "SELECT * from admins WHERE email='$email'";

$data =[
          "email" => $email,
          "password" => $password,
      ];

      $path = AURL."dashboard.php";
      $app->login($query,$data,$path);
  }



?>

<div class="container"> 
      <div class="row">

        <div class="col-md-10 mt-4 py-4">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center text-info"><i><?php  echo mb_strtolower("Welcome to Admin Panel!  login now"); ?></i></h5>
               <div class="text-center ml-3 py-4">
             <img src="../admin_images/Rest_logo.png" class="rounded-circle" width="100px" height="120px"/>
           </div>


              <form method="POST" class="p-auto" action="login_admins.php">
                  <!-- Email input -->
                  <div class="col-md-12  form-outline mb-4">
                    <input type="email" name="email" class="form-control email" placeholder="Email" />

                    <strong class="text-danger emailerr"></strong> 
                  </div>

                  
                  <!-- Password input -->
                  <div class="col-md-12  form-outline mb-4">
                    <input type="password" name="password" placeholder="Password" class="form-control password" />
                    <strong class="text-danger passworderr"></strong>  
                  </div>

                  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-block btn-primary  mb-4 text-center login_btn">Login</button>

                 
                </form>
            </div>
       </div>
     </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>