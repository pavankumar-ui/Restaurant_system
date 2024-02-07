<?php 

      require "./../../config/config.php";
       require "./../../libs/App.php";
        require "../layouts/header.php";
        require "../layouts/navbar.php";

        $app = new App;
$app->validateAdminSession();

$query = "SELECT *from foods order by f_id desc";
$foods = $app->selectAll($query);

?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="<?php echo AURL; ?>foods-admins/create-foods.php" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach($foods as $food) {  ?>
                  <tr>
                    <th scope="row" class="f_id"><?php echo $food->f_id; ?></th>
                    <td><?php echo $food->name; ?></td>
                    <td><img src="http://localhost/Restaurant_system/img/<?php echo $food->image; ?>" width="50px" height="60px"></td>
                    <td><b>$<?php echo $food->price; ?></b></td>
                     <td><a class="btn btn-danger text-white delete_food">delete</a></td>
                  </tr>
                <?php } ?>
                  
                </tbody>
              </table> 
            <?php require "../layouts/footer.php"; ?>