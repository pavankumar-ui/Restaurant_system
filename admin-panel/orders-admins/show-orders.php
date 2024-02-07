<?php 

      require "./../../config/config.php";
       require "./../../libs/App.php";
        require "../layouts/header.php";
        require "../layouts/navbar.php";

        $app = new App;
$app->validateAdminSession();

$query = "SELECT * from orders order by o_id desc";

$orders = $app->selectAll($query);




?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">town</th>
                    <th scope="col">country</th>
                    <th scope="col">zipcode</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">address</th>
                    <th scope="col">total_price</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  foreach($orders as $order) {  ?>
                  <tr>
                    <th scope="row" class="o_id"><?php echo $order->o_id; ?></th>
                    <td><?php echo $order->name; ?></td>
                    <td><?php echo $order->email; ?></td>
                    <td><?php echo $order->town; ?></td>
                    <td><?php echo $order->country; ?></td>
                    <td>
                        <?php echo $order->zipcode; ?>
                    </td>
                    <td><?php echo $order->phone_number; ?></td>
                    <td><?php echo $order->address; ?> </td>
                    <td>$<?php echo $order->total_price; ?></td>

                    <td><?php  echo $order->status;   ?></td>
                     <td><a class="btn btn-danger text-white delete_order">delete</a></td>
                  </tr>
                <?php } ?>
                  
                </tbody>
              </table> 
           <?php require "../layouts/footer.php"; ?>