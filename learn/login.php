<?php
include_once 'connection.php';

$uname=$_POST['uname'];
$upass=$_POST['upass'];

$cmd="select * from users where username='$uname' and password='$upass'";
$sql_res=mysqli_query($conn,$cmd);
$count=mysqli_num_rows($sql_res);

if($count==0)
{
    echo "<script> alert('Invalid Credentials!') </script>";
    header('location:client_login.html');
}
else
{
    session_start();
    $_SESSION['username']=$uname;    
    header('location:client_view_products.php');
}