<?php  

class App{

       public $host = HOST;
       public $dbname = DBname;
       public $user = USER;
       public $pass = PASS;

       public $link;


       public function __construct(){

       	$this->connect();
       }


       public function connect(){
       $this->link= new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."",$this->user,$this->pass);

       /*if($this->link){

       	echo("connection is working");
       }*/

     }

//to select all rows//
     public function selectAll($query){

     	$rows=$this->link->query($query);
     	$rows->execute();


     	$allRows= $rows->fetchall(PDO::FETCH_OBJ);

          $SC = $rows->rowCount()>0;

     		return $allRows;
     }

//to select single row//
     public function selectOne($query){

     	$row=$this->link->query($query);
     	$row->execute();

     	$oneRow= $row->fetch(PDO::FETCH_OBJ);

     	if($oneRow){
     		return $oneRow;
     	}else
     	{
     		return false;
     	}

          $count= $row->rowCount()>0;
     }

//insert records//
public function insert($query,$arr,$path)
{

       if($this->validate($arr)== "empty"){
       	echo "<script>alert('one or more inputs are empty');</script>";
       }
       else
       {
       	$insert_record=$this->link->prepare($query);
       	$insert=$insert_record->execute($arr);

          echo "<script>window.location.href='".$path."';</script>";

          if($insert){
          return true;
       }else
       {
          return false;
       }

       }
}


     public function update($query,$arr,$path)
     {
     	if($this->validate($arr)== "empty"){
     		echo "<script>alert('one or more inputs are empty');</script>";
     	}else
     	{
     		$update_record=$this->link->prepare($query);
     		$update = $update_record->execute($arr);
              

               if($update)
               {
                    return true;

               }else
               {
                    return false;
               }

     		echo "<script>window.location.href='".$path."';</script>";
     	}
     }


//delete records//
     public function delete($query,$path)
     {
     	$delete_record=$this->link->prepare($query);
     	$delete=$delete_record->execute();

          if($delete)
          {
               return true;
          }else
          {
               return false;
          }

          echo "<script>window.location.href='".$path."';</script>";

     }


//register records//

public function register($query,$arr,$path)
{
     if($this->validate($arr)== "empty"){
              echo "<script>alert('one or more inputs are empty');</script>";
         }
         else
         {

          $reg_record = $this->link->prepare($query);
          $success=$reg_record->execute($arr);
     

            echo "<script>window.location.href='.$path.'</script>";
     
     }

  }        



public function login($query,$data,$path)
{
     $login_user = $this->link->query($query);
     $login_user->execute();
     $fetch = $login_user->fetch(PDO::FETCH_ASSOC);
           if($login_user->rowCount()>0)
           {
               
               if(password_verify($data['password'],$fetch['password']))
               {
                    
               //start session vars
                    $_SESSION['email']= $fetch['email'];
                    $_SESSION['username']= $fetch['username'];
                    $_SESSION['user_id'] = $fetch['id'];
                    $_SESSION['admin']= $fetch['adminname'];
                     //redirect to app dashboard for successfull login//
                    echo "<script>alert('Admin logged in successfully');</script>";
                     echo "<script>window.location.href='".$path."';</script>";

               }else {
                     echo "<script>alert('Invalid username & password');</script>";
               }      
           }
}




 public function session_starting()
 {
    session_start();
 }


public function validateSession()
{
     if(!isset($_SESSION['user_id']))
     {
        echo "<script>window.location.href='".APPURL."';</script>";
     }
}

public function validateAdminSession()
{
     if(!isset($_SESSION['admin']))
     {
          echo "<script>window.location.href='".AURL."admins/login_admins.php';</script>";
     }
}


public function ValidateCart($vc)
{
      $row = $this->link->query($vc);
          $row->execute();
          $count= $row->rowCount()> 0;
          return $count;
}



//validation 
 public function validate($arr)
 {

 	if(in_array("",$arr)){
   	echo "empty";
    }
  }
}


?>