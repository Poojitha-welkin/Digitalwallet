<?php
session_start();
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST')
{
	$db=mysqli_connect("localhost","root","","peoplepay");
	$mobile=$_POST['mobile_no'];
	$password=$_POST['password'];

    $query="select password from profile where mobile_no='$mobile';";
    $user_entry=mysqli_query($db,$query);
    $up=mysqli_fetch_array($user_entry);
	if($password==$up[0])
	{

        $_SESSION["user_mobile"] = $mobile;
		header("Location: home.php");
	}
      
	mysqli_close($db);
}
?>
	
<html>
<head>
<title>LOGIN</title>
</head>
<body style="text-align:center">
   

<div style="background-color:grey;">

<br><br>
<h1 style="text-align:center">LOGIN</h1>

<p style="text-align:right;">POWERED BY PEOPLE PAY</p>
<hr>
</div>
<br><br><br><br><br><br><br>
<form action="login.php" method="post"><br><br>
   Mobile no: 
  <input type="number" name="mobile_no" maxlength="10" value="" required><br><br/>
  &nbsp;&nbsp;Password:
   <input type="password" name="password" value="" required><br><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="submit" value="LOG-IN" style="background-color:grey;padding:2px 65px">
    </form> </div>
<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="contact.html" style="text-decoration:none; color:black">forget password ?</a></center>
<?php
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST')
{
    echo'<div style="color:red;">THE PASSWORD OR MOBILE NUMBER YOU HAVE ENTARED IS INCORRECT</div>	';
}
?>
</body>
</html>