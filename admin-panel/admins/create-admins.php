
<?php 

      require "./../../config/config.php";
       require "./../../libs/App.php";
        require "../layouts/header.php";
        require "../layouts/navbar.php";

        $app = new App;
$app->validateAdminSession();


if(isset($_POST['create_admin']))
{


     $adminname= $_POST['adminname'];
     $email=$_POST['email'];
     $password=password_hash($_POST['password'], PASSWORD_DEFAULT);


           $query = "INSERT INTO `admins`(`adminname`,`email`,`password`) VALUES(:adminname, :email, :password)";


         $arr=[

              ":adminname" => $adminname,
              ":email" => $email,
              ":password" => $password,
            ];  


         $path = AURL."admins/admins.php";
           $response = $app->register($query,$arr,$path);
      
      if($response)
      {
         header('Content-Type: text/html');
        echo "<b>junior admin created successfully</b>";
      }else
      {
        echo "junior admin not created";
      }


     //header('content-type: application/json');
     
 
}


?>



    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="email" class="form-control" placeholder="email" / required>
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="adminname" id="adminname" class="form-control" placeholder="username" / required>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control" placeholder="password" / required>
                </div>


                <!-- Submit button -->
                <button type="submit" value="submit" class="btn btn-primary  mb-4 text-center create_admin_btn">create</button>

          
              </form>

              <?php require "../layouts/footer.php"; ?>