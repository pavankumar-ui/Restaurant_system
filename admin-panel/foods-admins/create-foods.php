<?php 

      require "./../../config/config.php";
       require "./../../libs/App.php";
        require "../layouts/header.php";
        require "../layouts/navbar.php";

        $app = new App;
$app->validateAdminSession();

if(isset($_POST['submit']))
{

      $name = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $meal_id  = $_POST['meal_id'];


      if(isset($_FILES['image']['name']))
                   {
                        $imagename=$_FILES['image']['name'];
                        $sourcepath=$_FILES['image']['tmp_name'];

                        if($imagename!="")
                        {
                        
                       $explodedName = explode('.', $imagename);
                       $ext = end($explodedName);

                        $imagename="food_name".rand(0000,9999).'.'.$ext;
                        $destinationpath='../../img/'.$imagename;

                       $upload=move_uploaded_file($sourcepath,$destinationpath);

                                  if($upload==false)
                                  {
                                    echo '<div class="alert alert-danger">Failed to upload image</div>';
                                        die();
                                }
                          }

                }
                   else
                   {
                         $imagename="";
                   }
      

      $query = "INSERT INTO `foods`(`name`,`price`,`image`,`description`,`meal_id`) VALUES(:name, :price, :image, :description, :meal_id)";


      $arr = [
                 ':name' => $name,
                 ':price' => $price,
                 ':image' => $imagename,
                 ':description' => $description,
                 ':meal_id' => $meal_id,
            ];


            $path = "show-foods.php";

            $add_foods= $app->insert($query,$arr,$path);

            if($add_foods)
            {
              echo "<script>alert('food inserted');</script>";
            }  else
            {
              echo "<script>alert('food insertion failed');</script>";
            }

}








?>
    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Food Items</h5>
          <form method="POST" action="create-foods.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                </div>


                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                </div>



                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
               
                <div class="form-outline mb-4 mt-4">
                  <select name="meal_id" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Meal</option>
                    <option value="1">Breakfast</option>
                    <option value="2">Launch</option>
                    <option value="3">Dinner</option>
                  </select>
                </div>

                <br>
              

      
                <!-- Submit button -->
                <input type="submit" name="submit" value="submit" class="btn btn-primary  mb-4 text-center"/>

          
              </form>

            <?php require "../layouts/footer.php"; ?>