<?php

session_start();
$id=$_POST['pid'];

$ind=array_search($id,$_SESSION['id']);

array_splice($_SESSION['id'],$ind,1);

header('location:client_view_cart.php');

