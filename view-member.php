<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Member Search</title>
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
		<div class="panel-heading"><h5>Member Search</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
				Member Search <br>
					<table width="90%" class="table table-hover">
						<thead>
							<tr >
								<th></th>
							</tr>
						</thead>
					<tr>
						<td>
						<?php
						$urlview1="view-member.php?id=name";
						?>
						<input type="button" class="btn btn-info" value="Search by Name" onclick="location.href = 'search-member-name.php';">
						
						</td>
						<td>
						<?php
						$urlview2="view-member.php?id=id";
						?>
						<input type="button" class="btn btn-info" value="Search by Member ID" onclick="location.href = 'search-member-id.php?';">
							
						
						</td>
						
					</tr>
				</table>
			
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
