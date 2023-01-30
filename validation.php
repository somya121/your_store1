<?php

session_start();
$con = mysqli_connect('localhost:3306','root','12345678') or die(mysql_error());
mysqli_select_db($con,'userregistration') or die(mysql_error());
$name = $_POST['user'];
$pass = $_POST['password'] ;
$s= "select * from usertable where name='$name'&& password = '$pass' ";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num==1){
    $_SESSION['username']= $name;
header('location:your_store.php');
}
else{
 header('location:account.php') ;
}
?>
