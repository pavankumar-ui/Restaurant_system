<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){

    echo "<script>window.location.href='".APPURL."';</script>";
    exit;
}
?>


<?php

if(isset($_GET['id']))
{ 

    $id = $_GET['id'];
    $query = "SELECT * from foods where f_id ='$id'";
    $app = new App;
       $one=$app->selectOne($query);

            // to validate the cart//
      if(isset($_SESSION['user_id']))
      {

               $user_id = $_SESSION['user_id'];
          $vc = "SELECT * from cart WHERE item_id ='$id' AND  user_id ='$user_id'";
          $app = new App;
          $count = $app->ValidateCart($vc);      
      }



//add to cart// 
if(isset($_POST['add_cart']))
{
   $item_id = $_POST['item_id'];
   $name = $_POST['name'];
   $image = $_POST['image'];
   $price = $_POST['price'];
   $user_id = $_SESSION['user_id'];
   


$query = "INSERT INTO `cart` (`item_id`,`name`,`image`,`price`,`user_id`) VALUES (:item_id, :name, :image, :price, :user_id )";


        $arr = [
                   ":item_id" => $item_id,
                   ":name" => $name,
                   ":image" => $image,
                   ":price" => $price,
                   ":user_id" => $user_id,
              ];

         $app = new App;
        $path = "cart.php"; 
       $app->insert($query,$arr,$path);     
     }
    
 }
 else
     {

          echo '<script>window.location.href="'.APPURL.'/404_error.php";</script>';

     }


?>


<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Add Cart</h1>
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
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="../img/<?php  echo $one->image; ?>">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4"><?php  echo $one->name;  ?></h1>
                        <p class="mb-4"><?php  echo $one->description; ?></p>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>Price: $ <?php echo $one->price;  ?> </h3>                                   
                                </div>
                            </div>
                           
                        </div>

                       <form method="POST" action="add-cart.php?id=<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-md-3">
                          <input class="form-control" type="text" name="item_id" value="<?php echo $id; ?>">
                          </div>

                          <div class="col-md-3">
                           <input class="form-control" type="text" name="name" value="<?php echo $one->name; ?>">
                          </div>
                      </div>
                        <br>
                      <div class="row">
                        <div class="col-md-3">
                         <input class="form-control" type="text" name="price" value="<?php echo $one->price; ?>">
                          </div>

                          <div class="col-md-3">
                           <input class="form-control" type="text" name="image" value="<?php echo $one->image; ?>">
                          </div>
                      </div>

                      <?php if(isset($_SESSION['user_id'])){  ?>
              <?php  if($count>0) { ?>   
       <button type="submit" name="added_to_cart" class="btn btn-primary py-3 px-5 mt-2" disabled>Added to Cart</button>
          <?php }else { ?>
       
       <button type="submit" name="add_cart" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>

              <?php } ?>
                     
    <?php }else { ?>   
<button type="submit" name="add_cart" id="cart_error" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>
         
       <?php } ?>   

                        </form>

                    </div>
                </div>
            </div>
        </div>

      <?php require "../includes/footer.php"; ?> 