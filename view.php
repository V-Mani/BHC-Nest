
<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();
	echo $uid=$_SESSION['uid'];
	$date=date('d/m/yy');
	$un=$_REQUEST['un'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Social Network</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <br>
      
        <h1>Profiles</h1>
       
	   
	   <table align="center">
	   <tr>
	   <td width="216">&nbsp;</td>
	   </tr>
	   <?php
	   
	   $qty=mysql_query("select * from users where user_nickname='$un'");
	  while( $row=mysql_fetch_array($qty))
	   {
	   
	 
	  ?>
	   <td> Full Name &nbsp;&nbsp;<?php echo $row['user_firstname'] . $row['user_lastname']; ?></td>
	   </tr>
	   <tr>
	  
	   <td>Date Of Birth &nbsp;&nbsp; <?php echo $row['user_birthdate'];?> </td>
	   </tr>
	   <tr>
	   <td> Hometown  &nbsp;&nbsp;<?php echo $row['user_hometown'];?> </td>
	   </tr>
	   
	   
	    <tr>
	   <td> Department  &nbsp;&nbsp;<?php echo $row['dept'];?> </td>
	   </tr>
	   
	   
	   
	    
	    <tr>
	   <td> Class  &nbsp;&nbsp;<?php echo $row['class'];?> </td>
	   </tr>
	   
	     
	    <tr>
	   <td> Email Id  &nbsp;&nbsp;<?php echo $row['user_email'];?> </td>
	   </tr>
	   
	   
	   <tr>
	   <td> <img src="images\<?php echo $row['img'];?>" width="200" height="200"></td>
	   </tr>
	  
	  <?php
	  
	  }
	  
	   ?>
	   </table>
	   
	 
	     
	   <table align="center">
	   <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	   </table>
	  
	  
	  
	  
	
	   
	   
	      
	   <table align="center">
	   <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	      <?php
	   $qty=mysql_query("select * from posts where type='private' && uid='$uid'");
	  while( $row=mysql_fetch_array($qty))
	   {
	   
	   $pid=$row['uid'];
	     $qty1=mysql_query("select * from users where user_id='$pid'");
		 $row1=mysql_fetch_array($qty1);
	 	$uname=$row1['user_nickname'];
	  ?>
	  <tr>
	  <td colspan="2" align="center">Private Posts</td>
	  
	  <tr>
	   <td> Posted By &nbsp;&nbsp; <a href="profile.php?un=<?php echo $uname; ?>"><?php echo $uname;?></a></td>
	   </tr>
	   <tr>
	  
	   <td>Caption  &nbsp;&nbsp;<?php echo $row['caption'];?> </td>
	   </tr>
	   <tr>
	   <td> Date  &nbsp;&nbsp;<?php echo $row['date'];?> </td>
	   </tr>
	   <tr>
	   <td> <img src="upload\<?php echo $row['img'];?>" width="500" height="300"></td>
	   </tr>
	  
	  <?php
	  
	  }
	  
	   ?>
	   </table>
	   
	   
	   
	   
	   