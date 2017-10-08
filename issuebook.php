<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Issue Book</title>
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
		<div class="panel-heading"><h5>Registration Form</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
				Issue Book<br>
				<form role="form" name="" action="" method="GET">
					<div class="form-group">
					  Member ID <input class="form-control" name="empno" type="text" maxlength="6" 
					  placeholder ="Enter member ID" required>
					  Book ID <input class="form-control" name="book" type="text" 
					  value = "<?php echo $_GET['book']?>" readonly>
					  Branch ID <input class="form-control" name="branch" type="text" 
					  value = "<?php echo $_GET['branch']?>" readonly>
					  Issue Date <input class="form-control" name="dateout" type="text" 
					  value = "<?php echo date("Y-m-d")?>" readonly>
					  Due Date <input class="form-control" name="duedate" type="text" 
					  value = "<?php echo date('Y-m-d', strtotime("+30 days"))?>" readonly>
					  
					  <input class="btn btn-embosed btn-primary" type="submit" value="Issue Book" >
					</div>
				</form>
				<hr>
						
				<?php
				//check staff name input by the user if null
				if(!isset($_GET['empno'])){
					
				}
				else{//if there's user search - then perform db search
				//Create SQL query
					$memid=$_GET['empno'];
					$branch=$_GET['branch'];
					$book=$_GET['book'];
					$dateout = $_GET['dateout'];
					$duedate = $_GET['duedate'];
					
					$query="INSERT INTO `loan-record`(`bookID`, `BranchID`, `CardID`, `DateOut`, `DueDate`) 
					values ('$book','$branch','$memid','$dateout','$duedate')";
					//Execute the query
					$qr=mysqli_query($db,$query);
					if($qr==false){
						echo ("Query cannot be executed!<br>");
						echo ("SQL Error : ".mysqli_error($db));
					}
					else{//insert successfull
						echo "Book Issued";
						//echo  mysqli_insert_id($db);
						//echo "<a href='php-db-template.php?staffname=$firstname'>View $firstname $lastname</a>";
					}
					
					$query2="UPDATE inventory SET Copies = Copies - 1 where BranchID = '$branch' and BookID = '$book'";
				
    				//Execute second query
    				$qr2=mysqli_query($db,$query2);
    				if($qr2==false){
    					echo ("Query cannot be executed!<br>");
    					echo ("SQL Error : ".mysqli_error($db));
    				}
    				else{//no error in sql
    				//echo ("Book removed from inventory<br>");
    				}
					
				}
				$urlview="member-record.php?id=$memid";
				?>
			
			<input type="button" class="btn btn-info" value="Go to Member Record" onclick="location.href = '<?php echo $urlview?>';">
			
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
