
<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();
	echo $uid=$_SESSION['uid'];
	$date=date('d/m/yy');
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
        
		
		
		<h2 align="center">Posts From Admin </h2>
	   
	   <table width="106%" align="center">
	<tr>
		<td colspan="7">&nbsp;</td>
		</tr>
		
		
	
	
		    <tr>
          <td width="1%">&nbsp;</td>
          <td width="7%"><div align="center" class="style6"><strong>Id</strong> </div></td>
		  <td width="7%"><div align="center" class="style6"><strong>Event Name</strong> </div></td>
		   <td width="11%"><div align="center" class="style6"><strong>Location</strong> </div></td>
		    <td width="11%"><div align="center" class="style6"><strong>Date</strong> </div></td>
			 <td width="9%"><div align="center" class="style6"><strong>Event Description</strong> </div></td>
			  <td width="13%"><div align="center" class="style6"><strong>Image</strong> </div></td>
			  
		    
        </tr>
		<tr>
		<td colspan="7">&nbsp;</td>
		</tr>
		<?php
		$qry=mysql_query("select * from events order by date asc ");
		$i=1;
		while($row=mysql_fetch_array($qry))
		{
		
		?>

        <tr>
		 <td width="1%">&nbsp;</td>
		    <td><div align="center"><?php echo $row['id'];?></div></td>
		   <td><div align="center"><?php echo $row['name'];?></div></td>
			  <td><div align="center"><?php echo $row['loc'];?></div></td>
			 <td><div align="center"><?php echo $row['date'];?></div></td>
			  <td><div align="center"><?php echo $row['desc'];?></div></td>
			    <td><div align="center"><img src="images\<?php echo $row['img'];?>" width="100" height="100"></div></td>
				 
				
		 
        </tr>
		
		
		 <tr>
		  	 	<td>&nbsp;</td>
		   		<td>&nbsp;</td>
				<td>&nbsp;</td>
			 	<td>&nbsp;</td>
			 	<td>&nbsp;</td>
			 	<td>&nbsp;</td>
				<td>&nbsp;</td>
			 
		
		</tr>
		
        <?php
		$i++;
		}
		
		?>
				<tr>
		<td colspan="7" align="center">&nbsp;</td>
		</tr>
		
		</table>



	   