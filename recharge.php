<?php 
    session_start();
    $u_mobile_no=$_SESSION["user_mobile"];
	if(isset($_SESSION["user_mobile"]))
	{
        $db=mysqli_connect("localhost","root","","peoplepay");
        }
?>
<html>

<head>
<title>RECHARGE</title>
</head>

<body>
<div style="background-color:grey;">
<br><br>
<h1 style="text-align:center">RECHARGE</h1>
<p style="text-align:left;">POWERED BY PEOPLE PAY</p>
<div style="text-align:right">
<form><a href="logout.php"><input style="background-color:light grey; color:black;font-size:105%;padding: 1px 10px;" type="button" value="LOG OUT"></a></form>
</div>
<hr>
</div><br><br><br>

<center>
<img alt="recharge image" src="images\recharge.png" width="100" height="100"><br><br><br>


<table>

<form action="recharge_php.php" method="post" style="text-align:center">
<tr><td>NUMBER:</td>
 <td><input type="text" placeholder="recharge number" name="recharge_number" value="" required></td></tr>
 <tr><td>AMOUNT:</td>
 <td><input type="text"  placeholder="amount" name="amount" value="" required></td></tr>
<tr><td>OPERATOR:</td>
  <td><select name="operator">
  <option value="airtel">airtel</option>
  <option value="docomo">docomo</option>
  <option value="vodafone">vodafone</option>
  <option value="idea">idea</option>
  <option value="jio">jio</option>
  <option value="bsnl">bsnl</option>
  <option value="mtnl">mtnl</option>
  <option value="t24">t24</option>
</select></td></tr>
<tr><td></td><td><input type="submit" value="recharge" name="submit" style="background-color:grey;padding: 3px 60px;"></td></tr>
</form>
</table>
</center>
</body>

</html>


