<?php
 session_start();
 ?>
 <?php
    $invalid_phone=false;
    $amt_err=false;
 if(isset($_POST['back'])){
    header("location:ViewCustomer.php");
 }

 if(isset($_POST['send'])){
    
    $custid=$_SESSION['custid'];
    $rphone=$_POST['phone'];
    $amount=$_POST['amount'];
    
    if($rphone ==""){
        echo"<script>
               alert('You have not entered Phone Number');
            </script>";
        
        echo"<script>
        window.location='http://localhost/BankingSystem/Transferamount.php'
        </script>";
    } 
    
    if($amount ==""){
        echo"<script>
               alert('You have not entered Amount to be transfered');
            </script>";
        
        echo"<script>
        window.location='http://localhost/BankingSystem/Transferamount.php'
        </script>";
    }


    include("Connection.php");

    $sql1=mysqli_query($con,"SELECT * FROM customer_details WHERE Customer_Id=$custid");
    $row1=mysqli_fetch_array($sql1);

    $sphone=$row1['Contact'];
    
    //echo"$sphone";

    $sql=mysqli_query($con,"SELECT * FROM customer_details WHERE Contact=$rphone");
    $rows=mysqli_num_rows($sql);

    if($rows==0 or $sphone == $rphone){
        $invalid_phone=true;
    }

    if( $invalid_phone==false){
        $sql=mysqli_query($con,"SELECT Balance FROM customer_details WHERE Customer_Id=$custid");
        $row=mysqli_fetch_array($sql);

        $amt=$row['Balance'];
        if($amount>$amt){
            $amt_err=true;
        }
    }
    if($invalid_phone==false and $amt_err==false){
    $_SESSION['rphone']=$rphone;
    $_SESSION['amount']=$amount;
    
    echo"<script>
         window.location='http://localhost/BankingSystem/Transcationconfirm.php'
         </script>";}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Tansferamount.css">
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

</body>
</html>

<?php
  
   $custid=$_SESSION['custid'];

   include("Connection.php");

   $sql=mysqli_query($con,"SELECT * FROM customer_details WHERE Customer_Id=$custid");
   $row=mysqli_fetch_array($sql);

   echo"<div class='container' style='width:25%;margin-top:5%;background-color:#b8e7f5;border:1px solid #b8e7f5;box-shadow:4px 4px  silver;'>";
   echo"<div style='padding:10%;'>";
   echo"<label>Sender's Name</label><br>";
   echo"<input type='text' class='form-control' name='name' id='name' value=".$row['Name']." readonly><br>";
   echo"<label>Sender's Account Number</label><br>";
   echo"<input type='text' class='form-control' name='name' id='name' value=".$row['Account No']." readonly><br>";

   echo"<form action='Transferamount.php' method='post'>";
   echo"<label>Phone Number</label>";
   echo"<input type='tel' class='form-control' name='phone' pattern='[0-9]{10}' id='phone'><br>";

   echo"<label>Enter the Amount</label>";
   echo"<input type='text' class='form-control' name='amount' id='amount' ><br>";

   echo"<button type='submit' name='back' class='btn cnl'>Back</button>";
   echo"<button type='submit' name='send' class='btn styles'>Send</button>";
   echo"</form>";
   echo"</div>";
   echo"</div>";
    
   echo"<div style='padding:5%'>";
   if($invalid_phone == true){
    echo"<span id='demo'style='color:red;font-weight:bold;font-size:15pt;margin-left:39%; text-shadow: 5px;text-transform: capitalize;'>Invalid phone number</span>";
   }

   if($amt_err == true){
    echo"<span id='demo'style='color:red;font-weight:bold;font-size:15pt;margin-left:39%; text-shadow: 5px;text-transform: capitalize;'>Insufficeint balance</span>";
   }
   echo"</div>";
?>