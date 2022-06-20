<?php
include_once 'connection.php';

$id=$_POST['pid'];
$name=$_POST['name'];
$desc=$_POST['description'];
$price=$_POST['price'];

$cmd="update products set name='$name',description='$desc',price=$price where id=$id";

$res=mysqli_query($conn,$cmd);
if($res)
{
    header('location:view_products.php');
}
else
{
    echo "Error in Update";
}