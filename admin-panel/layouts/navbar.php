<nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?php echo AURL; ?>admin_images/Rest_logo.png" class="rounded-circle" width="40px" height="40px"/>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" style="margin-left: 20px;" href="<?php echo AURL; ?>dashboard.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo AURL; ?>admins/admins.php" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo AURL; ?>orders-admins/show-orders.php" style="margin-left: 20px;">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo AURL; ?>foods-admins/show-foods.php" style="margin-left: 20px;">Foods</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo AURL; ?>bookings-admins/show-bookings.php" style="margin-left: 20px;">Bookings</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo AURL; ?>dashboard.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">login
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['admin']; ?>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo AURL; ?>/admins/admin_logout.php">Logout</a>
              
          </li>
                          
          
        </ul>
      </div>
    </div>
    </nav>