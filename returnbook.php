<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Returned</title>
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
		<div class="panel-heading"><h5>LIBRARY MANAGEMENT SYSTEM</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
			<?php
				$id1=$_GET['id1'];
				$id2=$_GET['id2'];
				$id3=$_GET['id3'];
				//Create SQL query
                
				$query="UPDATE `loan-record` SET DateIn = CURDATE() where CardID='$id1' and BranchID = '$id2' and bookID = '$id3'";
			    //Execute the query
				$qr=mysqli_query($db,$query);
				if($qr==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
				    echo ("Issued Book returned -- Success!<br>");
				}
				
				$query2="UPDATE inventory SET Copies = Copies + 1 where BranchID = '$id2' and BookID = '$id3'";
				
				//Execute second query
				$qr2=mysqli_query($db,$query2);
				if($qr2==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
				echo ("Book added to inventory -- Success!<br>");
				}
				$urlview="member-record.php?id=$id1";
			?>
			
			<input type="button" class="btn btn-info" value="Go back to Member Record" onclick="location.href = '<?php echo $urlview?>';">
				
				
			
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

<!--<meta http-equiv="refresh" content="0;URL=php-db-template.php" /> -->