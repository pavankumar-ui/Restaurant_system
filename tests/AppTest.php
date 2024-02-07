<?php

use PHPUnit\Framework\TestCase;


class AppTest extends TestCase
{

	public function testLoginisWorkingSuccessfully(){


//setup
		require "./config/config.php";
		require "./libs/App.php";

		$app = new App;
		$email = "admin.first@gmail.com";

		$password = password_hash('M!ain@admin', PASSWORD_DEFAULT);
     
		$query = "SELECT * from admins where email = '$email'";
      
      $data = [
                 "email" =>$email,
                 "password" => $password,
              ];

              $path = "dashoard.php";

		$login_test = $app->login($query,$data,$path);

            $this->assertEquals(0,$login_test);
         
		//make assertions//
	}
}

?>