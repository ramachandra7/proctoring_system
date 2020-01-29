<?php
session_start();

// sleep(5);
// header("Location: https://www.google.com");
// // header( "refresh:0;url=https://www.google.com" );


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'ost_project');
$regdNo = $_GET['regdNo'];

 $s = "delete
  FROM pendingfaculty where regdNo='$regdNo'";

mysqli_query($con,$s);

header( "refresh:0;url=../PendingRegistrations/pendingRegistration.php" );



?>

<!DOCTYPE html>
<html>
<head>
	<title>reject</title>
</head>
<body>

</body>
</html>