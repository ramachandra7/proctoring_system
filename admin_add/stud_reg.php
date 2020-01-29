<?php


$regdNo=$_POST['regdNo'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["student_img"]["name"]);
$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . $regdNo .".". $ext;
move_uploaded_file($_FILES["student_img"]["tmp_name"], $target_file);

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'ost_project');


$name=$_POST['name'];
$fname=$_POST['fname'];
$department=$_POST['department'];
$year=$_POST['year'];
$section=$_POST['section'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];


$s = "select * from students where regdNo = '$regdNo'";

$res=mysqli_query($con,$s);

$num=mysqli_num_rows($res);

if($num >= 1){
	


?>
<script>
 alert("Student details already entered");
 
</script>

<?php
header( "refresh:0;url=addStudent.php" );
}else

{

	$reg="INSERT INTO students values('$regdNo','$name','$year','$section','$department','$fname','$mobile','$email','$address')" ;
       
mysqli_query($con,$reg);





?>

<script>
 alert("details entered successfully....");


</script>

<?php
 header( "refresh:0;url=addStudent.php" );

}

?>