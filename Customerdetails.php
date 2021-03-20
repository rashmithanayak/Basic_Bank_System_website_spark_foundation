<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="Customerdetails.css">
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand text-muted" href="#" style="font-size:25px;color:blue;">The Sparks Foundation-Bank System</a>
          </div>

          <div >
             <ul class="nav navbar-nav navbar-right ">
                <li><a href="index.html"><span class="glyphicon glyphicon-home marleft"></span> Home</a></li>
                <li><a href="Transcatiodetails.php">Transaction History</a></li>
             </ul>
            </div>
        </div>
    </nav>

</body>
</html>

<?php
  session_start();
  $custid=$_SESSION['custid'];
  include("Connection.php");
  $sql=mysqli_query($con,"SELECT * FROM customer_details WHERE Customer_Id=$custid");
  $row=mysqli_fetch_array($sql);
  
  echo"<div class='container stylemargin' >";
  echo"<table class='table table-hover table-bordered'><tr style='background-color:silver;height:5%;'><td colspan='2'>Account details of  ".$row['Name']."</td></tr>";
  
  echo"<tr><td> Customer ID</td>";
  echo"<td>".$row['Customer_Id']."</td></tr>";

  echo"<tr><td>Name</td>";
  echo"<td>".$row['Name']."</td></tr>";

  echo"<tr><td>Account Number</td>";
  echo"<td>".$row['Account No']."</td></tr>";

  echo"<tr><td>Current Balance</td>";
  echo"<td>".$row['Balance']."</td></tr>";

  echo"<tr><td>Branch Name</td>";
  echo"<td>".$row['Branch Name']."</td></tr>";

  echo"<tr><td>Account Type</td>";
  echo"<td>".$row['Account Type']."</td></tr>";

  echo"<tr><td>Email Id</td>";
  echo"<td>".$row['Email Id']."</td></tr>";

  echo"<tr><td>Contact Number</td>";
  echo"<td>".$row['Contact']."</td></tr>";
  
  echo"<tr><td colspan='2'><a href='Transferamount.php'><button type='button' class='btn btn-primary stylebtn'>TRANSFER</button></a></table>";
  echo"</div>";
?>


