<?php
 $servername="localhost";
 $username="root";
 $password="";
 $database_name="bankSystem";

 $con=mysqli_connect($servername,$username,$password,$database_name);
 if (!$con) {
    die("Connection failed: " . $con->mysqli_connect_error());
  }
 ?>
