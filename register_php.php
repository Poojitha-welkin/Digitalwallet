
<html>
<head>

</head>
<body>
    
</body>
</html>

<?php

$u_name=$_POST["u_name"];

$u_mobile=$_POST["mobile_no"];

$u_email=$_POST["email_id"];

$u_password=$_POST["password"];


$db=mysqli_connect("localhost","root","","peoplepay");


$check_query=mysqli_query($db,"select * from profile where mobile_no='$u_mobile';");

?>
<div style="background-color:grey;">
<br>
<h1 style="text-align:center;font-size:300%;font-family:courier;">PEOPLE PAY</h1>
<p style="text-align:right;">POWERED BY PEOPLE PAY</p>
</div><br><br><br>
<?php
if(mysqli_num_rows($check_query)>=1)

{

?>
    <script>alert("This mobile number already exists");
</script>

<h1><center>mobile number is already registered,login by giving passwoord</center></h1>

<?php

}


else

{

if(strlen($u_mobile)==10)
{
$insert="insert into profile(u_name,mobile_no,email_id,password) values('$u_name','$u_mobile','$u_email','$u_password');";

$re=mysqli_query($db,$insert);

$insert="insert into wallet(mobile_no,balance) values('$u_mobile','0');";

$re=mysqli_query($db,$insert);
?>
<center><h1>hurray!!! you have successfully registered to people pay</h1><h3>please go back and login.</h3></center>
<?php
}
else
{
?>
<center><h1>please enter the valid mobile number</h1></center>
<?php
}
}

mysqli_close($db);

?>