<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['login']))
{
$qry=mysql_query("select * from admin where  name='$uname' && psw='$psw'");
$num=mysql_num_rows($qry);
if($num==1)
{
?>
<script>alert('welcome to admin home page');
</script>
<?php

header("location:adminhome.php");
}
else
{
echo "<script>alert('User Name Password Wrong.....')</script>";

}
}
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Social Network</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <style>
        .container{
            margin: 40px auto;
            width: 400px;
        }
        .content {
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 5px #4267b2;
        }
    </style>
</head>
<body>
    <h1>Welcome to BHC Hub</h1>
    <div class="container">
        <div class="tab">
            <button class="tablink active" onClick="openTab(event,'signin')" id="link1">Login</button>
               </div>
        <div class="content">
            <div class="tabcontent" id="signin">
                <form method="post" onSubmit="return validateLogin()">
                    <label>User Name<span></span></label><br>
                    <input type="text" name="uname" id="loginuseremail">
                    <div class="required"></div>
                    <br>
                    <label>Password<span></span></label><br>
                    <input type="password" name="psw" id="loginuserpass">
                    <div class="required"></div>
                    <br><br>
                    <input type="submit" value="Login" name="login">
                </form>
            </div>
           
	
	<a href="index.php">Login</a>
</body>
</html>
