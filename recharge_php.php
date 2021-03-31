<?php

session_start();
$u_mobile_no=$_SESSION["user_mobile"];


if(isset($_SESSION["user_mobile"]))

{


?>
<div style="background-color:grey;">
<br><br>
<h1 style="text-align:center">PEOPLE PAY</h1>
<p style="text-align:left;">POWERED BY PEOPLE PAY</p>
<div style="text-align:right">
<form><a href="logout.php"><input style="background-color:light grey; color:black;font-size:105%;padding: 1px 10px;" type="button" value="LOG OUT"></a></form>

</div><br><br><br>
<?php
$db=mysqli_connect("localhost","root","","peoplepay");


$operator=$_POST["operator"];
$recharge_number=$_POST["recharge_number"];
$amount=$_POST["amount"];
 
$type="recharge";
$drcr="dr";

$balance_c_query=mysqli_query($db,"select balance from wallet where mobile_no=$u_mobile_no;");
$balance_c=mysqli_fetch_array($balance_c_query);

$balance_c=(int)$balance_c[0];

if($balance_c>=$amount && strlen($recharge_number)==10)
{
$transaction_id_query=mysqli_query($db,"select transaction_id from transaction order by transaction_id desc;");
    
$transaction_id=mysqli_fetch_array($transaction_id_query);
 
$transaction_id=(int)$transaction_id[0]+1;

   


$update="insert into transaction(mobile_no,transaction_id,t_type,amount,drcr) values('$u_mobile_no','$transaction_id','$type','$amount','$drcr');";
  
$re=mysqli_query($db,$update);

    

$insert="insert into recharge(transaction_id,recharge_no,operator) values('$transaction_id','$recharge_number','$operator');";
$re=mysqli_query($db,$insert);

$update="update wallet set balance=balance-$amount where mobile_no=$u_mobile_no;";
   
$re=mysqli_query($db,$update);
?>
<center>
<img alt="success image" src="images\success.png" width="100" height="100">
<h1><?php echo($recharge_number); ?> is successfully recharged with <?php echo($amount); ?>RS</h1>
</center>  
<?php
} 
else if(strlen($recharge_number)<=9 ||strlen($recharge_number)>=11)
{
?>
<center>
<img alt="unsuccess image" src="images\failure.png" width="100" height="100">
<h1>please enter valid mobile number</h1>
</center>
<?php
}

else if($balance_c<=$amount)
{
?>
<center>
<img alt="unsuccess image" src="images\failure.png" width="100" height="100">
<h1>recharge is not successfull due to insufficient balance,please add the money and retry </h1>
</center>
<?php
mysqli_close($db);

}
}


else

{
    
header("Location: home.php");

}

?>


