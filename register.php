<!DOCTYPE HTML>
<head>
    <title>register page</title>
   <link rel = "stylesheet" type="text/css" href="Form1.css">
</head>


<body>
    <div style="background-color:grey;">
<br><br>
<h1 style="text-align:center">CREATE PEOPLEPAY ACCOUNT</h1>

<p style="text-align:right;">POWERED BY PEOPLE PAY</p>
<hr>
</div>
<br><br><br><br><br><br><br><br>

      <center>
	  <form action="register_php.php" method="post">
       <table>
        <tr>
         <td>Name :</td> <td><input type="text" placeholder="username" name="u_name" value="" required><br></td>
        </tr>
        <tr>
          <tr>
         <td>phone number :</td> <td><input type="number" placeholder="number" name="mobile_no" max_length="10" value="" required></td>
        </tr>
        <tr>
		 <td>Email :</td> <td><input type="email" placeholder="mail id" name="email_id" value="" required></td>
        </tr>
        <tr>
         <td>Password :</td> <td><input type="password" placeholder="password" name="password" value="" required></td>
        </tr>
    
       <tr>
         <td></td><td><input type="submit" value="REGISTER" style="background-color:grey;padding:2px 50px"></td>
        </tr>
       </table>
      </form>
  </center>
<html>
 