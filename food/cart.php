<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php

if(!isset($_SESSION['user_id'])){

    echo "<script>window.location.href='".APPURL."';</script>";
    exit;
}


       error_reporting(0);

         if(isset($_SESSION['user_id']))
         {
                
                  $user_id = $_SESSION['user_id'];
                $query = "SELECT * from cart where user_id ='$user_id'";
                $app = new App;
                $cart_items = $app->selectAll($query);
                $cart_price = "SELECT sum(price) as all_price from cart WHERE user_id='$user_id'";
                $cp =$app->selectOne($cart_price);


        if(isset($_POST['submit']))
         {
                $_SESSION['total_price'] = $cp->all_price;                  
                $path= "checkout.php";
                echo '<script>window.location.href="'.$path.'";</script>';
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
                
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Cart_ID</th>
                            <th scope="col">Item_ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                       <?php  if($_SESSION['total_price']>0){ ?> 

                         <?php foreach($cart_items as $cart_item){ ?>

                          <tr>
                            <td class="cart_id"><?php  echo $cart_item->id; ?></td>
                            <td><?php echo $cart_item->item_id; ?> </td>
        <td><img src="../img/<?php echo $cart_item->image; ?>" width="50px" height="50px"></td>
                            <td><?php echo $cart_item->name; ?></td>
                            <td>$<?php echo $cart_item->price; ?></td>
<td><a class="btn btn-danger text-white delete_cart">delete</td>
                          </tr>
                         <?php   }  ?>

                     <?php  }else{ ?>

                <p class=" text-danger">Cart is empty please add some items in the cart</p>

                     <?php } ?>

                        </tbody>
                      </table>
                      <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                       
                       <!--checkout ---->

                       
                        
                    <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text">
                        <?php if(isset($_SESSION['user_id'])){ ?>
                            <strong>Grand Total:</strong> $<?php echo $cp->all_price; ?> </p>
                            
                            <form  method="POST" action="cart.php">
                        <button  name="submit" type="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                        </form>
                    <?php  } ?>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
        <?php require "../includes/footer.php"; ?>