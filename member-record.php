<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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
		<div class="panel-heading"><h5>Member Dashboard</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
						
				<?php
				$id=$_GET['id'];
				if($id == "")
				{
					echo "No member id provided <br>";
					echo "Redirecting to homepage in 5 secs...... <br><br><br>";
					?><meta http-equiv="refresh" content="5;URL=index.php" />
					<?php
				}
				//Create SQL query

				$query="select *
				from members where StudentId='$id'";
			    //Execute the query
				$qr=mysqli_query($db,$query);
				if($qr==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
					$rec=mysqli_fetch_array($qr);
				}
				
				$query2="SELECT y.BranchName,z.title,x.DateOut,x.DueDate FROM `loan-record` as x,library as y,books as z WHERE x.`CardID` = '$id' and x.BranchID = y.BranchID and x.bookID = z.bookID and datediff( x.DueDate, x.DateIn ) IS NULL ";
				
				//Execute second query
				$qr2=mysqli_query($db,$query2);
				if($qr2==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
				}
				
				$query3="SELECT x.CardID,x.BranchID,x.BookID,x.DateOut,x.DueDate FROM `loan-record` as x,library as y,books as z WHERE x.`CardID` = '$id' and x.BranchID = y.BranchID and x.bookID = z.bookID and datediff( x.DueDate, x.DateIn ) IS NULL ";
				
				//Execute second query
				$qr3=mysqli_query($db,$query3);
				if($qr3==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
				}
				
				
			?>
			
			--Member info--<br>
				<form role="form" name="" action="" method="GET">
					<div class="form-group">
					  Member ID <input class="form-control" name="bookid" type="text" 
					  value="<?php echo $rec['StudentId']; ?>">
					  Name <input class="form-control" name="name" type="text" 
					  value="<?php echo $rec['FName']." ".$rec['LName']; ?>">
					  Address <input class="form-control" name="address" type="text" 
					  value="<?php echo $rec['Address']; ?>" >
					  Phone No. <input class="form-control" name="phoneno" type="text" 
					  value="<?php echo $rec['Phone']; ?>" >
					  Books Issued:
					
				<?php  
					  //display a message
				if(mysqli_num_rows($qr)==0)
				{
					echo ("Sorry, seems that no book is issued...<br>");
				}//end no record
				else
				{//there is/are record(s)
				?>
					<table width="90%" class="table table-hover">
						<thead>
							<tr >
							    <th>Book</th>
								<th>Branch</th>
								<th>Date of Issue</th>
								<th>Due Date</th>
								<th></th>
							</tr>
						</thead>
				<?php
					while ($rec2=mysqli_fetch_array($qr2)){//redo to other records
					    
					    $id1=$rec['StudentId'];
					    $rec3=mysqli_fetch_array($qr3);
					    $id2=$rec3['BranchID'];
					    $id3=$rec3['BookID'];
						$urlupdate="returnbook.php?id1=$id1&id2=$id2&id3=$id3";
				?>
					<tr>
					    <td><?php echo $rec2['title']?></td>
						<td><?php echo $rec2['BranchName']?></td>
						<td><?php echo $rec2['DateOut']?></td>
						<td><?php echo $rec2['DueDate']?></td>
						<td><a href="<?php echo $urlupdate?>" class="btn btn-warning" title="Return Book" 
						data-toggle="tooltip" >Return Book</td>
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
