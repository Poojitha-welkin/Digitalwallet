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
<title>Add</title>
</head>
<body  style="text-align:center">
<div style="background-color:grey;">
<br><br>
<h1 style="text-align:center">ADD MONEY</h1>
<p style="text-align:left;">POWERED BY PEOPLE PAY</p>
<div style="text-align:right">
<form><a href="logout.php"><input style="background-color:light grey; color:black;font-size:105%;padding: 1px 10px;" type="button" value="LOG OUT"></a></form>
</div>
<hr>
</div>


<div style="text-align:center">
<h3>WALLET BALANCE : <?php echo($balance); ?></h3><br><br>
<img alt="add image" src="images1\add1.jpg" width="100" height="90">
</div>
<center>
<table>
<form action="add_php.php" method="post">
<tr>
<td>AMOUNT:</td><td> <input type="number"  placeholder="amount" name="amount" value="" required></td>
</tr>

<tr>
<td>PAYMENT TYPE:</td><td><select name="payment">
  <option value="debit card">debit card</option>
  <option value="credit card">credit card</option>
</select></td></tr>

<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>

<tr>
<td>CARD NUMBER:</td><td> <input type="number"  placeholder="16 digit number" maxlength="16" name="card_number" value="" required></td>
</tr>

<tr>
<td>EXPIRY YEAR:</td><td> <input type="number"  placeholder="year" maxlength="4" name="expiry_year" value="" required></td>
</tr><br>

<tr>
<td>CVV:</td><td> <input type="number"  placeholder=" 3 digit number"  maxlength="3" name="cvv" value="" required></td>
</tr><br>

<tr>
<td></td><td><input type="submit" value="ADD" name="submit" style="background-color:grey;padding: 3px 65px;"></td>
<tr>
</form>
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