<?php
  include("Connection.php");
  session_start();
   if(isset($_POST['View'])){
    $id=$_POST['View'];
    $_SESSION['custid']=$id;
    
    
      echo"<script>
      window.location='http://localhost/BankingSystem/Customerdetails.php'
           </script>";
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
    <link rel="stylesheet" href="Viewcustomer.css">
</head>
<body>
<nav class="navbar navbar-custom" style="position:fixed;width:100%;">
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

    <div class="container divstyle">

    <table class="table table-bordered" style="margin-top:20%;">
        <tr style="text-align:center;">
            <td colspan="5" style="font-size:25px;">All Customers</td>
        </tr>
        <tr>
            <th style="width:10px;">Sl.No.</th>
            <th>Holder Name</th>
            <th>Account Number</th>
            <th>Contact</th>
            <th style="width:10px;"></th>
        </tr>
    
    <?php
        include("Connection.php");
       
        
        $sql=mysqli_query($con,"SELECT * FROM customer_details");
        $i=1;

        while($row=mysqli_fetch_assoc($sql)){
            echo"<form action='ViewCustomer.php' method='post'><tr>";
            echo"<td>".$i."</td>";
            echo"<td>".$row['Name']."</td>";
            echo"<td>".$row['Account No']."</td>";
            echo"<td>".$row['Contact']."</td>";
            echo"<td><button type='submit' name='View' value=".$row['Customer_Id']." onmousedown='showgreen(this)' class='btn btn-primary styles'>View</button></td>"; 
            echo"</form></tr>";
            $i++;
        }
    ?>

</table>
</div>

<script>
    function showgreen(){
        x.style.backgroundColor="green";
        x.style.borderColor="green";
    }
</script>
</body>
</html>