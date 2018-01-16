<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Member Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Loading Flat UI Pro -->
    <link href="css/flat-ui-pro.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
  
</head>
<body>

<?php 
//include the navigation bar
include ("inc/navbar.php");?>

<div class="container">
	<br>
	<br>
  

  <div class="row">
    
    <div class="col-md-9" name="maincontent" id="maincontent">
		
		<div id="exercise" name="exercise" class="panel panel-info">
		<div class="panel-heading"><h5>UPDATE existing member</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			<?php
				//fetch old record to display in form
				$id=$_GET['id'];
				//sql to fetch selected staff
				$sql="select * from members 
					where StudentId='$id'";
					//echo $sql;
				$rs=mysqli_query($db,$sql);
				//check sql command
				if($rs==false){//sql error
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no sql error
					$rekod=mysqli_fetch_array($rs);
				}
			?>
				Update Existing Staff Record<br>
				<form role="form" name="" action="save-update.php" method="GET">
					<div class="form-group">
					  Member ID <input class="form-control" name="memid" 
					  type="text" maxlength="6" 
					  value="<?php echo $rekod['StudentId']?>" readonly>
					  Firstname <input class="form-control" name="firstname" type="text" 
					  value ="<?php echo $rekod['FName']?>" required>
					  Lastname <input class="form-control" name="lastname" type="text" 
					  value ="<?php echo $rekod['LName']?>" >
					  Address
					  <input class="form-control" name="address" type="text" 
					  value ="<?php echo $rekod['Address']?>" required>
					  Phone <input class="form-control" name="phoneno" type="text" maxlength="14" 
					  value="<?php echo $rekod['Phone']?>" required>
					  
					  <input class="btn btn-embosed btn-primary" type="submit" value="Save UPDATE" >
					</div>
				</form>
				<hr>
						
				
			
			<!-- ***********Edit your content ENDS here******** -->	
			</div> <!--body panel main -->
		</div><!--toc -->
		
    </div><!-- end main content -->
	
    <div class="col-md-3">
		<?php 
		//include the sidebar menu
		include ("inc/sidebar-menu.php");?>
    </div><!-- end main menu -->
  </div>
</div><!-- end container -->


<?php 
//include the footer
include ("inc/footer.php");?>

</body>
</html>
