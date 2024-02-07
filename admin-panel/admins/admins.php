<?php 

      require "./../../config/config.php";
       require "./../../libs/App.php";
        require "../layouts/header.php";
        require "../layouts/navbar.php";

        $app = new App;
$app->validateAdminSession();

$query ="SELECT * from admins limit 0,10";
$admins = $app->selectAll($query);




?>
    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo AURL; ?>admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">adminname</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach($admins as $admin){ ?>
                  <tr>
                    <th scope="row"><?php echo $admin->id; ?></th>
                    <td><?php echo $admin->adminname; ?></td>
                    <td><?php echo $admin->email; ?></td>
                   
                  </tr>
                  <?php } ?>
                </tbody>
              </table> 
          <?php require "../layouts/footer.php"; ?>