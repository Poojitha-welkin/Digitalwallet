<html>
<head></head>
<body>
<?php

session_start();

$u_mobile_no=$_SESSION["user_mobile"];

if(isset($_SESSION["user_mobile"]))

{

?>
<div style="background-color:grey;">
<br><br>
<h1 style="text-align:center">PEOPLE PAY</h1>
<p style="text-align:right;">POWERED BY PEOPLE PAY</p>
<form><a href="logout.php"><input style="background-color:light grey; color:black;font-size:105%;padding: 1px 10px;" type="button" value="LOG OUT"></a></form>

</div><br><br><br>
<?php
    
$db=mysqli_connect("localhost","root","","peoplepay");

    
$amount=(int)$_POST["amount"];
    

$payment=$_POST["payment"];

$card_number=$_POST["card_number"];
$expiry_date=$_POST["expiry_year"];
$cvv            =$_POST["cvv"];
$type="add";
    
$drcr="cr";
  
  
$transaction_id_query=mysqli_query($db,"select transaction_id from transaction order by transaction_id desc;");
    
$transaction_id=mysqli_fetch_array($transaction_id_query);
 
$transaction_id=(int)$transaction_id[0]+1;

    

if(strlen($card_number)==16 && strlen($expiry_date)==4 && strlen($cvv)==3 && $expiry_date>=2018  && $expiry_date<=2024)
{
$update="insert into transaction(mobile_no,transaction_id,t_type,amount,drcr) values('$u_mobile_no','$transaction_id','$type','$amount','$drcr');";
  
$re=mysqli_query($db,$update);

    

$insert="insert into add_to_wallet(transaction_id,transaction_type) values('$transaction_id','$payment');";

$re=mysqli_query($db,$insert); 
    
 
?>

 
<center>
<img alt="success image" src="images\success.png" width="100" height="100">
<h1><?php echo($amount); ?>RS is added successfully </h1>
</center>  
<?php 
}


else 
{
?>
<center>
<img alt="unsuccess image" src="images\failure.png" width="100" height="100">
<h1>invalid card </h1>
</center>
<?php
mysqli_close($db);

}


}
else

{
    
header("Location: login.php");

}

?>
</body>

</html>