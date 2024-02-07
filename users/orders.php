<?php  require "../config/config.php"; ?>
<?php  require "../libs/App.php"; ?>  
<?php require "../includes/header.php"; ?>
<?php

if(!isset($_SESSION['user_id'])){

    echo "<script>window.location.href='".APPURL."';</script>";
    exit;
}

?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>


<?php
error_reporting(0);
$user_id = $_SESSION['user_id'];
 $query ="SELECT * from orders WHERE user_id='$user_id'";

 $app= new App;

  $orders =$app->selectAll($query);


?>


<!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" class="text-info">Order_ID</th>
                            <th scope="col" class="text-info">Name </th>
                            <th scope="col" class="text-info">Email</th>
                            <th scope="col" class="text-info">Town</th>
                            <th scope="col" class="text-info">Country</th>
                            <th scope="col" class="text-info">ZipCode</th>
                            <th scope="col" class="text-info">Contact No</th>
                            <th scope="col" class="text-info">Address</th>
                            <th scope="col" class="text-info">Total Price</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                         
                      
                     
                         <?php foreach($orders as $order){ ?>

                          <tr>
                            <td class="cart_id"><?php  echo $order->o_id; ?></td>
                            <td><?php  echo $order->name; ?> </td>
        <td><?php  echo $order->email; ?></td>
                            <td><?php  echo $order->town; ?></td>
                            <td><?php  echo $order->country; ?></td>
                            <td><?php  echo $order->zipcode; ?></td>
                            <td><?php  echo $order->phone_number; ?></td>
                            <td><?php  echo $order->address; ?></td>
                            <td>$<?php  echo $order->total_price; ?></td>

                          </tr>
                         <?php   }  ?>
                    
                      
                        </tbody>
                      </table>
                      
                </div>
            </div>
        <!-- Service End -->





<?php require "../includes/footer.php"; ?>