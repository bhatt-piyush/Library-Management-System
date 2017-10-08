<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert new book</title>
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
		<div class="panel-heading"><h5>Add New Book to Inventory</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
				Book info<br>
				<form role="form" name="" action="" method="GET">
					<div class="form-group">
					  BookID <input class="form-control" name="isbn" type="text" maxlength="6" 
					  placeholder ="ISBN number" required>
					  Book Title <input class="form-control" name="title" type="text" 
					  placeholder ="Book Name here..." required>
					  Author <input class="form-control" name="author" type="text" 
					  placeholder ="Author name here..." required>
					  Choose Library 
					  <select class="form-control" name="library">
						<option value="1">Sterling C. Evans Library & Annex</option>
						<option value="2">Policy Sciences & Economics Library</option>
						<option value="3">Medical Sciences Library</option>
						<option value="4">Cushing Memorial Library & Archives</option>
						<option value="5">West Campus Library</option>
					  </select>
					  No. of copies
					  <select class="form-control" name="copies">
					   <?php for( $i=1; $i<=100; $i++ )
					      {?>
					          <option value=<?php echo "$i"?>><?php echo "$i"?></option>
					      <?php } ?>
						
					  </select>
					  <br>
					  <br>
					  <input class="btn btn-embosed btn-primary" type="submit" value="Add book to inventory" >
					</div>
				</form>
				<hr>
						
				<?php
				//check staff name input by the user if null
				if(!isset($_GET['title']) && !isset($_GET['author'])){
					
				}
				else{//if there's user search - then perform db search
				//Create SQL query
				    $bookid=$_GET['isbn'];
					$title=$_GET['title'];
					$author=$_GET['author'];
					$library=$_GET['library'];
					$copies =$_GET['copies'];
					
					$test = "select * from books where bookID = '$bookid'";
					$result = mysqli_query($db,$test);
					
					if (!($result->num_rows))
					{
    					$query="INSERT INTO books
    					values ('$bookid','$title','$author')";
    					
    					//Execute the query
    					$qr=mysqli_query($db,$query);
    					if($qr==false){
    						echo ("Query cannot be executed!<br>");
    						echo ("SQL Error : ".mysqli_error($db));
    					}
    					else{//insert successfull
    						echo "New book registered";
    						//echo "<a href='php-db-template.php?staffname=$firstname'>View $firstname $lastname</a>";
    					}
    					
    					$query="INSERT INTO inventory 
    					values ('$bookid','$library','$copies')";
    					//Execute the query
    					$qr=mysqli_query($db,$query);
    					if($qr==false){
    						echo ("Query cannot be executed!<br>");
    						echo ("SQL Error : ".mysqli_error($db));
    					}
    					else{//insert successfull
    						//echo "<a href='php-db-template.php?staffname=$firstname'>View $firstname $lastname</a>";
    					}
					}
					
					else {
					    echo "BOOK ALREADY EXISTED! ";
					    $query="UPDATE inventory 
    					set copies = copies + $copies 
    					where BookID = '$bookid' and BranchID = '$library'";
    					//Execute the query
    					$qr=mysqli_query($db,$query);
    					if($qr==false){
    						echo ("Query cannot be executed!<br>");
    						echo ("SQL Error : ".mysqli_error($db));
    					}
    					else{//insert successfull
    						//echo "<a href='php-db-template.php?staffname=$firstname'>View $firstname $lastname</a>";
    						echo "New copy added to inventory! ";
    					}
					}
				}
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
