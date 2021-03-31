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
</div><br><br><br>
<?php

$db=mysqli_connect("localhost","root","","peoplepay");


$receiver_number=$_POST["receiver_number"];
$amount=$_POST["amount"];
 
$type1="send";
$type2="receive";
$drcr1="dr";
$drcr2="cr";

$balance_c_query=mysqli_query($db,"select balance from wallet where mobile_no=$u_mobile_no;");
$balance_c=mysqli_fetch_array($balance_c_query);

$balance_c=(int)$balance_c[0];

$user_checker_query=mysqli_query($db,"select mobile_no from profile where mobile_no=$receiver_number;");


if($balance_c>=$amount && mysqli_num_rows($user_checker_query)==1)
{

$transaction_id_query=mysqli_query($db,"select transaction_id from transaction order by transaction_id desc;");
    
$transaction_id=mysqli_fetch_array($transaction_id_query);
 
$transaction_id1=(int)$transaction_id[0]+1;

   
$transaction_id2=(int)$transaction_id[0]+2;

  

$update="insert into transaction(mobile_no,transaction_id,t_type,amount,drcr) values('$u_mobile_no','$transaction_id1','$type1','$amount','$drcr1');";
  
$re=mysqli_query($db,$update);

    
$update="insert into transaction(mobile_no,transaction_id,t_type,amount,drcr) values('$receiver_number','$transaction_id2','$type2','$amount','$drcr2');";
  
$re=mysqli_query($db,$update);

   

$update="update wallet set balance=balance-$amount where mobile_no=$u_mobile_no;";
   
$re=mysqli_query($db,$update);
$update="update wallet set balance=balance+$amount where mobile_no=$receiver_number;";
   
$re=mysqli_query($db,$update); 

$insert="insert into send(transaction_id,sender_number,receiver_trx_id) values('$transaction_id1','$u_mobile_no','$transaction_id2');";
$re=mysqli_query($db,$insert);
$insert="insert into receive(transaction_id,receiver_number,sender_trx_id) values('$transaction_id2','$receiver_number','$transaction_id1');";
$re=mysqli_query($db,$insert);
?>   
<center>
<img alt="success image" src="images\success.png" width="100" height="100">
<h1><?php echo($amount); ?>RS is successfully sent to <?php echo($receiver_number); ?></h1>
</center>
<?php
}
else if(mysqli_num_rows($user_checker_query)!=1)
{
?>
<center>
<img alt="unsuccess image" src="images\failure.png" width="100" height="100">
<h1>please enter a registered people pay user</h1>
</center>
<?php
}
else if($balance_c<=$amount)
{
?>
<center>
<img alt="unsuccess image" src="images\failure.png" width="100" height="100">
<h1>transaction is not successfull due to insufficient balance  </h1>
</center>
<?php
}
mysqli_close($db);

}


else

{
    
header("Location: home.php");

}

?>


