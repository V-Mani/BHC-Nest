
<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();
	echo $uid=$_SESSION['uid'];
	$date=date('d/m/yy');
	if(isset($_POST['post']))
	{
	
	$imgpath=$_FILES['file']['name'];
	  $errors= array();
      $fname = $_FILES['file']['name'];
   $file_type=$_FILES['file']['type'];
     $file_tmp =$_FILES['file']['tmp_name'];
     $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
	 $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== true)
	  {
       move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$fname);
  
  $max_qry = mysql_query("select max(id) from posts");
		$max_row = mysql_fetch_array($max_qry); 
		$id=$max_row['max(id)']+1;
  
  $qry=mysql_query("insert into posts values('$id','$caption','$date','$type','$uid','$fname')");
if($qry)
{
echo "<script>alert('Posted Sucessfully');</script>";
}
else
{
echo "<script>alert('Data Not Save');</script>";

}

}
else
{

 echo "<script>alert('File Format Not Supported')</script>";
}

}
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
        <div class="createpost">
            <form method="post" action=""  enctype="multipart/form-data">
                <h2>Make Post</h2>
                <hr>
                <span style="float:right; color:black">
                <input type="radio" id="type" name="type" value="public" required>
                <label>Public</label>
				 <input type="radio" id="type" name="type" value="Private">
                <label>Private</label>
                </span>
                Caption <span class="required" style="display:none;"> *You can't Leave the Caption Empty.</span><br>
                <textarea rows="6" name="caption"></textarea>
                <center><img src="" id="preview" style="max-width:580px; display:none;"></center>
                <div class="createpostbuttons">
                    <!--<form action="" method="post" enctype="multipart/form-data" id="imageform">-->
                    <label>
                        <img src="images/photo.png">
                        <input type="file" name="file" id="file">
                        <!--<input type="submit" style="display:none;">-->
                    </label>
                    <input type="submit" value="Post" name="post">
                    <!--</form>-->
                </div>
            </form>
        </div>
        <h1>News Feed</h1>
       
	   
	   <table align="center">
	   <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	   <?php
	   
	   $qty=mysql_query("select * from posts where type='public' order by date asc");
	  while( $row=mysql_fetch_array($qty))
	   {
	   
	   $pid=$row['uid'];
	     $qty1=mysql_query("select * from users where user_id='$pid'");
		 $row1=mysql_fetch_array($qty1);
	 	$uname=$row1['user_nickname'];
	  ?>
	   <td> Posted By &nbsp;&nbsp; <a href="view.php?un=<?php echo $uname; ?>"><?php echo $uname;?></a></td>
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
	   <td> Posted By &nbsp;&nbsp; <a href="view.php?un=<?php echo $uname; ?>"><?php echo $uname;?></a></td>
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
	   
	   
	   
	   
	   