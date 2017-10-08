<?php
$db=new mysqli("0.0.0.0","root","","library-database");
//mysqli_connect("0.0.0.0","root","","mycompanyhr");
//Check connection
if (mysqli_connect_errno()) {
	echo "Connect failed: %s\n", mysqli_connect_error($db);
	exit();
}
?>