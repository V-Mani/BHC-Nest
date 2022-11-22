
<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();
	$uid=$_SESSION['uid'];
	$dept=$_SESSION['dept'];
	$class=$_SESSION['class'];
	if(isset($_POST['Send']))
	{
 	 $max_qry = mysql_query("select max(id) from group1");
		$max_row = mysql_fetch_array($max_qry); 
		$id=$max_row['max(id)']+1;
  $qry=mysql_query("insert into group1 values('$id','$uid','$class','$msg')");
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
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <br>
        <div class="createpost">
            <form method="post" action=""  enctype="multipart/form-data">
                <h2>Make a Chat</h2>
                <hr>
               Enter A Messsage <span class="required" style="display:none;"> *You can't Leave the Caption Empty.</span><br>
                <textarea rows="3" name="msg"></textarea>
                <center><img src="" id="preview" style="max-width:580px; display:none;"></center>
                     <input type="submit" value="Send" name="Send">
                    <!--</form>-->
                </div>
            </form>
        </div>
        <h1>Group Messages</h1>
       
	   
	   <table align="center">
	   <tr>
	   <td width="83">&nbsp;</td>
	   <td width="163">&nbsp;</td>
	   <td width="110">&nbsp;</td>
	   </tr>
	   <?php
	   
	   $qty=mysql_query("select * from group1 where class='$class' order by id desc");
	  while($row=mysql_fetch_array($qty))
	   {
	   $uid=$row['uid'];
	   $qty1=mysql_query("select * from users where user_id='$uid'");
	 	$row1=mysql_fetch_array($qty1);
	 ?>
	 
	 <tr>
	 
	 <td>From &nbsp;&nbsp;<?php echo  $row1['user_nickname'];?></td>
	 </tr>
	 
	 
	 
	 
	 <tr>
	  <td width="83">&nbsp;</td>
	 <td align="right"><?php echo $row['msg'];?></td>
	 </tr>
	 
	 
	  <tr>
	 <td>&nbsp;&nbsp;</td>
	 <td>&nbsp;&nbsp;</td>
	 </tr>
	 
	 <?php
	 }
	 
	 
	 ?>
	   
	   
	  </tr></table>
	   