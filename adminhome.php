<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['post']))
{
$max_qry = mysql_query("select max(id) from events");
	$max_row = mysql_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
$qry=mysql_query("insert into events values('$id','$name','$loc','$date','$desc','$img')");

if($qry)
{

echo "<script>alert('Insert Sucess')</script>";
}

else
{

echo "<script>alert('Failed')</script>";

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
            <button class="tablink active" onClick="openTab(event,'signin')" id="link1">Admin Home Page</button>
               </div>
        <div class="content">
            <div class="tabcontent" id="signin">
                <form method="post" onSubmit="return validateLogin()">
                    <label>Event Name<span></span></label><br>
                    <input type="text" name="name" id="name">
                    <div class="required"></div>
                    <br>
                    <label>Location<span></span></label><br>
                    <input type="text" name="loc" id="loc">
                    <div class="required"></div>
                    <br>
					
					
					<br>
                    <label>Date<span></span></label><br>
                    <input type="date" name="date" id="date">
                    <div class="required"></div>
                    <br>
					
					<br>
                    <label>Enter Description<span></span></label><br>
                    <textarea name="desc" ></textarea>
                    <div class="required"></div>
                    <br>
					
					
					
					<br>
                    <label>Upload Image<span></span></label><br>
                    <input type="file" name="img">
                    <div class="required"></div>
                    <br>
					
					
					<br>
                    <input type="submit" value="post" name="post">
                </form>
            </div>
           
	
	<a href="index.php">LogOut</a> 
</body>
</html>
