<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deletion</title>
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
				$id=$_GET['id'];
				//Create SQL query
                
                $query2="SELECT * from `loan-record` where CardID = '$id' and DateIn = '0000-00-00' ";
				
				//Execute second query
				$qr2=mysqli_query($db,$query2);
				if($qr2==false){
					echo ("Query cannot be executed!<br>");
					echo ("SQL Error : ".mysqli_error($db));
				}
				else{//no error in sql
					$rec2=mysqli_fetch_array($qr2);
				}
                
                if(mysqli_num_rows($qr2)==0)
                {
    				$query="Delete from members
    				where StudentId = '$id'";
    			    //Execute the query
    				$qr=mysqli_query($db,$query);
    				if($qr==false){
    					echo ("Query cannot be executed!<br>");
    					echo ("SQL Error : ".mysqli_error($db));
    				}
    				else{//no error in sql
    				    echo ("Person removed as Library Member!<br>");
    				}
                }
                else 
                {
                    echo "Seems like one or more books are issued by this member... <br> MEMBER CANNOT BE DELETED UNLESS BOOK RETURNED <br>";
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
