
<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();
	$uid=$_SESSION['uid'];
	$dept=$_SESSION['dept'];
	$class=$_SESSION['class'];
	if(isset($_POST['update']))
	{
 	$qry=mysql_query("update  users set user_nickname='$usernickname',user_password='$userpass',user_email='$useremail',user_hometown='$userhometown',user_status='$userstatus',user_about='$userabout',img='$img' where user_id='$uid'");
if($qry)
{
echo "<script>alert('Posted Sucessfully');</script>";
}
else
{
echo "<script>alert('Data Not Save');</script>";

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
           <button class="tablink" onClick="openTab(event,'signup')" id="link2">Update Profiles</button>
		   <a href="home.php">Back To Home</a>
        </div>
       
            <div class="tabcontent" id="signup">
                <form method="post" onSubmit="return validateRegister()">
                    <!--Package One-->
                    <h2>Highly Required Information</h2>
                    <hr>
                     <!--Nickname-->
                    <label>Nickname</label><br>
                    <input type="text" name="usernickname" id="usernickname">
                    <div class="required"></div>
                    <br>
                    <!--Password-->
                    <label>Password<span>*</span></label><br>
                    <input type="password" name="userpass" id="userpass">
                    <div class="required"></div>
                    <br>
                    <!--Confirm Password-->
                    <label>Confirm Password<span>*</span></label><br>
                    <input type="password" name="userpassconfirm" id="userpassconfirm">
                    <div class="required"></div>
                    <br>
                    <!--Email-->
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="useremail">
                    <div class="required"></div>
                    <br>
                  
                   
                    <div class="required"></div>
                    <br>
                    <!--Hometown-->
                    <label>Hometown</label><br>
                    <input type="text" name="userhometown" id="userhometown">
                    <br>
                    <!--Package Two-->
                    <h2>Additional Information</h2>
                    <hr>
                    <!--Marital Status-->
                    <input type="radio" name="userstatus" value="Singe" id="singlestatus">
                    <label>Single</label>
                    <input type="radio" name="userstatus" value="Engaged" id="engagedstatus">
                    <label>Engaged</label>
                    <input type="radio" name="userstatus" value="Married" id="marriedstatus">
                    <label>Married</label>
                    <br><br>
                    <!--About Me-->
                    <label>About Me</label><br>
                    <textarea rows="12" name="userabout" id="userabout"></textarea>
                    
					 <br><br>
                    <!--About Me-->
                    <label>Upload Profile Pic</label><br>
                    <input type="file" name="img">
					
                    <input type="submit" value="update" name="update">
                </form>
            </div>
        </div>
    </div>
    <script src="resources/js/main.js"></script>
</body>
</html>
