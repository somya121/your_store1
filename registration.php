<?php
header('location:account.php');
session_start();
$con = mysqli_connect('localhost:3306','root','12345678') or die(mysql_error());
mysqli_select_db($con,'userregistration') or die(mysql_error());
$name = $_POST['user'];
$pass = $_POST['password'] ;
$s= "select * from usertable where name='$name' ";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num==1){
echo" Username Already Taken";
}
else{
    $sql = "INSERT into usertable(name , password) VALUES('$name' , '$pass')";
    mysqli_query($con, $sql);
    echo"Registration Successful";
}
?>
