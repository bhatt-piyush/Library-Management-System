<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book stats</title>
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
		<div class="panel-heading"><h5>Book's info</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
						
				<?php
				$id=$_GET['id'];
				//Create SQL query

				$query="select *
				from books where bookID='$id'";
				$query2 = "SELECT library.BranchName, y.Copies FROM `library` , inventory AS y WHERE y.BookID ='$id' AND y.BranchID = library.branchID";//to get library names
				//Execute the query
				$qr=mysqli_query($db,$query);
				if($qr==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
					$rec=mysqli_fetch_array($qr);
				}
				
				//Execute second query
				$qr2=mysqli_query($db,$query2);
				if($qr2==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
				}
				
				$query3="SELECT library.BranchID FROM `library` , inventory AS y WHERE y.BookID ='$id' AND y.BranchID = library.branchID";
				
				//Execute second query
				$qr3=mysqli_query($db,$query3);
				if($qr3==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
				}
				
			?>
			
			--Book Info--<br>
				<form role="form" name="" action="" method="GET">
					<div class="form-group">
					  Book ID <input class="form-control" name="bookid" type="text" 
					  value="<?php echo $rec['bookID']; ?>" >
					  Author <input class="form-control" name="author" type="text" 
					  value="<?php echo $rec['author']; ?>" >
					  Title <input class="form-control" name="title" type="text" 
					  value="<?php echo $rec['title']; ?>" >
					  Available at:
					
				<?php  
					  //display a message
				if(mysqli_num_rows($qr)==0)
				{
					echo ("Sorry, seems that book is not available in any of the libraries...<br>");
				}//end no record
				else
				{//there is/are record(s)
				?>
					<table width="90%" class="table table-hover">
						<thead>
							<tr >
								<th>Branch</th>
								<th>Available Copies</th>
								<th></th>
							</tr>
						</thead>
				<?php
					while ($rec2=mysqli_fetch_array($qr2)){//redo to other records
					
						$rec3=mysqli_fetch_array($qr3);
					    $id2=$rec3['BranchID'];
						$urlupdate="issuebook.php?book=$id&branch=$id2";
				?>
					<tr>
						<td><?php echo $rec2['BranchName']?></td>
						<td><?php echo $rec2['Copies']?></td>
						<td><a href="<?php echo $urlupdate?>" class="btn btn-warning" title="Issue Book" 
						data-toggle="tooltip" >Issue Book</td>
					</tr>
				<?php
					}//end of records
				?>
				</table>
				<?php
				}//end if there are records
				?>
					  
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
