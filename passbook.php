<?php
session_start();
    $u_mobile_no=$_SESSION["user_mobile"];
	if(isset($_SESSION["user_mobile"]))
	{
        $db=mysqli_connect("localhost","root","","peoplepay");
        $u_balance_query=mysqli_query($db,"select balance from  wallet w where mobile_no='$u_mobile_no';");
        if(mysqli_num_rows($u_balance_query)>=1)
		{
            $u_balance=mysqli_fetch_array($u_balance_query);
            $balance=$u_balance[0];
?>

<html>
<head>
<title>PASSBOOK</title>

</head>
<body>

<div style="background-color:grey;">
<br><br>
<h1 style="text-align:center">PASSBOOK</h1>
<p style="text-align:left;">POWERED BY PEOPLE PAY</p>
<div style="text-align:right">
<form><a href="logout.php"><input style="background-color:light grey; color:black;font-size:105%;padding: 1px 10px;" type="button" value="LOG OUT"></a></form>
</div>
<hr>
</div>


<center>
<table border="4" width="50%" style="background-color:#ECE7E7;">


<tr>
<th colspan="4"><h2>wallet balance: <?php echo($balance);  ?>&nbsp;rs</h2></th>
</tr>

<tr>
<th>TRANSACTION ID</th>
<th>TRANSACTION TYPE</th>
<th>AMOUNT IN RS</th>
<th>DEBIT OR CREDIT</th>
</tr>

<?php
$pas_query=mysqli_query($db,"select transaction_id,t_type,amount,drcr from transaction where mobile_no='$u_mobile_no';");
if(mysqli_num_rows($pas_query)>=1)
{
while($row= mysqli_fetch_array($pas_query)) 
{ 
echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
}
}
else
{
?>
<h1>NO transaction has been done</h1>
<?php
}
?>
</table>
</center>

</body>
</html>
<?php   
     
 }
   mysqli_close($db);
 }

 else {
        header("Location: login.php");
    }
       ?>