<?php
$success=false;
$failure=false;
session_start();

$custid=$_SESSION['custid'];
$rphone=$_SESSION['rphone'];
$amount=$_SESSION['amount'];

include("Connection.php");

if(isset($_POST['yes'])){

    $sql=mysqli_query($con,"SELECT * FROM customer_details WHERE Customer_Id=$custid");
    $row=mysqli_fetch_array($sql);
    $samount=$row['Balance']-$amount;
    
    $sql1=mysqli_query($con,"UPDATE customer_details SET Balance=$samount WHERE Customer_Id=$custid");

    $sql2=mysqli_query($con,"SELECT Balance FROM customer_details WHERE Contact=$rphone");
    $row1=mysqli_fetch_array($sql2);

    $ramount=$row1['Balance']+$amount;
    if($sql1==true){
    $sql3=mysqli_query($con,"UPDATE customer_details SET Balance=$ramount WHERE Contact=$rphone");
    }

    if($sql1==true and $sql2==true){
    $sname=$row['Name'];
    $saccno=$row['Account No'];

   // echo"$rphone";
    $sql4=mysqli_query($con,"INSERT INTO transcation_details(`Sender_name`,`Saccno`,`Receiver_no`,`Amount`) VALUES('$sname','$saccno','$rphone','$amount')");
    }

    if($sql2==true and $sql3==true and $sql4==true){
        $success=true;
    }
}
  if(isset($_POST['no'])){
    echo"<script>
    window.location='http://localhost/BankingSystem/Transferamount.php'
         </script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transcation Confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="TranscationConfirm.css">
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
                <li><a href="Transcatiodetails.php">Transaction History</a></li>
             </ul>
            </div>
        </div>
    </nav>

    <div class="container bg-info divalign">
        <h3>Are you sure ?</h3>
        <p>You want to transfer Rs.<?php echo"$amount";?> to <?php echo"$rphone"; ?></p>
        
        <form action="Transcationconfirm.php" method="post">
        <button type="submit" name="yes" class="btn btn-primary styles">Yes</button>
        <button type="submit" name="no" class="btn btn-primary cnl">No</button>
        </form>
    </div>
    <?php
    if($success == true){

        header("refresh:5;url=http://localhost/BankingSystem/Transferamount.php");

        echo"<span id='demo'style='color:green;font-weight:bold;font-size:15pt;margin-left:41%; text-shadow: 5px;text-transform: capitalize;'>Amount transfered Successfully</span>";
     }
   
   ?>
</body>
</html>