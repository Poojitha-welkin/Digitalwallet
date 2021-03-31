<?php 
    session_start();
    $u_mobile_no=$_SESSION["user_mobile"];
	if(isset($_SESSION["user_mobile"]))
	{
        $db=mysqli_connect("localhost","root","","peoplepay");
        $u_info_query=mysqli_query($db,"select u_name,balance from profile p, wallet w where p.mobile_no='$u_mobile_no' and p.mobile_no=w.mobile_no;");
        if(mysqli_num_rows($u_info_query)>=1)
		{
            $u_info=mysqli_fetch_array($u_info_query);
            $u_name=$u_info[0];
            $u_balance=$u_info[1];
?>

<html>
<head>
<title>HOME</title>
</head>

<body>
<div style="background-color:grey;">

  
<br><br>
<center>
<h1 style="text-align:center;font-size:300%;font-family:courier;">PEOPLE PAY</h1>
<h3>NAME : <?php echo($u_name); ?> &nbsp;&nbsp;&nbsp;&nbsp; WALLET BALANCE : <?php echo($u_balance);?>&nbsp;<?php echo'RS'; ?> &nbsp;&nbsp;&nbsp;&nbsp; MOBILE NO : <?php echo($u_mobile_no); ?></h3> 
<div style="text-align:right">
<form><a href="logout.php"><input style="background-color:light grey; color:black;font-size:105%;padding: 1px 10px;" type="button" value="LOG OUT"></a></form>
</div></div>
<br><br><br><br>
<div>
<center>
<table width="70%">
<tr>
<td><a href="add.php"><img alt="add image" src="images1\add.jpg" width="180" height="150"></a></td>
<td><a href="send.php"><img alt="send image" src="image2\coin.jpeg" width="180" height="180"></a></td>
<td><a href="recharge.php"><img alt="recharge image" src="image2\recharge.png" width="180" height="180"></a></td>
<td><a href="passbook.php"><img alt="passbook image" src="images1\passbook1.jpg" width="180" height="180"></a></td>
</tr><br>
<tr style="text-align:cente;">
<td><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADD MONEY</h3></td>
<td><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEND MONEY</h3></td>
<td><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RECHARGE</h3></td>
<td><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PASSBOOK</h3></td>
</tr>
</table>
</center>
</div>
</center>
</body>
</html>

<?php
        }
        mysqli_close($db);
    }

    else{
        header("Location: login.php");
    }
?>