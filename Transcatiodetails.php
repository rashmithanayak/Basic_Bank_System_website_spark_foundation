<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transcation details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      body{
        background-image:url('images/images (7).jpeg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
      }

    .navbar {
    position: relative;
    min-height: 67px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    padding: 10px;
   }

   .navbar-nav>li>a {
    padding-top: 15px;
    padding-bottom: 15px;
    /* margin-left:45px; */
    margin-right:75px;
   }

  .navbar-inverse .navbar-brand {
    color: white;
  }

  .navbar-custom{
     color:#ede8f5;
     background-color: #ede8f5;
 }
    </style>
</head>
<body>
<nav class="navbar navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-muted" href="#" style="font-size:25px;color:blue;">The Sparks Foundation-Bank System</a>
            </div>

            <div >
             <ul class="nav navbar-nav navbar-right ">
                <li><a href="index.html"><span class="glyphicon glyphicon-home marleft"></span> Home</a></li>
                <li class="active"><a href="Transcatiodetails.php">Transaction History</a></li>
             </ul>
            </div>
        </div>
    </nav>

    <h1 style="text-align:center;margin-bottom:3%;">Transcation details</h1>
</body>
</html>

<?php

include("Connection.php");
$sql=mysqli_query($con,"SELECT * FROM transcation_details ORDER BY date DESC");
while($rows=mysqli_fetch_array($sql)){
echo"<div class='bg-info' style='height:10%;width:40%;padding:0.75%;margin-left:30%;margin-top:1%'>";
echo"Rupees ".$rows['Amount']." is transfered from ". $rows['Sender_name']." (Account Number ".$rows['Saccno'].") to ".$rows['Receiver_no'].".";
echo"</div>";
}
?>

