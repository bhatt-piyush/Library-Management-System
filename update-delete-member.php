<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update or Delete Member</title>
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
		<div class="panel-heading"><h5>Update/Delete Member</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
				Search member to update/delete record<br>
				<form class="form-inline" role="form" name="" action="" method="GET">
					<div class="form-group">
					  <input class="form-control" name="memid" type="text" placeholder="Member ID...">
					  <input class="btn btn-embosed btn-primary" type="submit" value="Search">
					</div>
				</form>
				<hr>
				
				
				<?php
				//check staff name input by the user if null
				if(!isset($_GET['memid'])){
					echo "Search result here will be displayed here<br>";
					//exit();
				}
				else{//if there's user search - then perform db search
				//Create SQL query
					$memid=$_GET['memid'];
					$query="select *
					from members where StudentId = '$memid'";
					//Execute the query
					$qr=mysqli_query($db,$query);
					if($qr==false){
						echo ("Query cannot be executed!<br>");
						echo ("SQL Error : ".mysqli_error($db));
					}
					
					//Check the record effected, if no records,
					//display a message

				//display a message
				if(mysqli_num_rows($qr)==0)
				{
					echo ("Sorry, seems that no record found by the Member ID $memid...<br>");
				}//end no record
				else
				{//there is/are record(s)
				?>
					<h5>Search result "<?php echo $memid; ?>"</h5><br>
					<table width="90%" class="table table-hover">
						<thead>
							<tr >
								<th>Member ID</th>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Address</th>
								<th>Phone</th>
							</tr>
						</thead>
				<?php
					while ($rekod=mysqli_fetch_array($qr)){//redo to other records
				?>
					<tr>
						<td>
						<?php
						$id=$rekod['StudentId'];
						echo $id;
						$urlupdate="update-form.php?id=$id";
						$urldelete="delete.php?id=$id";
						?>
						<a href="<?php echo $urlupdate?>" class="btn btn-warning" title="Update staff record" 
						data-toggle="tooltip" > 
						<span class="fui-new"></span></a>
						<a href="#" class="btn btn-danger" title="Delete member record!" 
						data-toggle="tooltip" onclick="alertdelete()"> 
						<script>
							//script to redirect delete page
							function alertdelete() {
								var r = confirm("You really want to delete the member?");
								if (r == true) {
									window.location="<?php echo $urldelete?>";
								} else {
									
								}
							}
							</script>
						<span class="fui-trash"></span></a>
						
						</td>
						<td><?php echo $rekod['FName']?></td>
						<td><?php echo $rekod['LName']?></td>
						<td><?php echo $rekod['Address']?></td>
						<td><?php echo $rekod['Phone']?></td>
					</tr>
				<?php
					}//end of records
				?>
				</table>
				<?php
				}//end if there are records
			}//end db search
			?>
			
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
