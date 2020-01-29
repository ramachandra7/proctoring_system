<?php
session_start();

// sleep(5);
// header("Location: https://www.google.com");
// // header( "refresh:0;url=https://www.google.com" );


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'ost_project');
$regdNo = $_GET['regdNo'];

 $s = "select * from pendingfaculty where regdNo = '$regdNo'";

$res=mysqli_query($con,$s);


$rows=mysqli_fetch_assoc($res);




$reg="INSERT INTO faculty values('".$rows["regdNo"]."','".$rows["name"]."','".$rows["department"]."','".$rows["mobile"]."','".$rows["email"]."')" ;
       
mysqli_query($con,$reg);

$reg="INSERT INTO faculty_passwords values('".$rows["regdNo"]."','".$rows["password"]."')" ;
       
mysqli_query($con,$reg);


 $s = "delete
  FROM pendingfaculty where regdNo='$regdNo'";

mysqli_query($con,$s);



header( "refresh:0;url=../PendingRegistrations/pendingRegistration.php" );





?>