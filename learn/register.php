<?php

include_once 'connection.php';

$uname=$_POST['uname'];
$upass=$_POST['upass'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];

$cmd="insert into users(username,password,mobile,address) values('$uname','$upass','$mobile','$address')";

$res=mysqli_query($conn,$cmd);
if($res)
{
   header('location:client_login.html');
  // window.location.assign("client_login.html");
}
else
{
    echo "<script> alert('Username/Mobile Already Regsitred') </script>";
}
