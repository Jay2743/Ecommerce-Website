<?php
include_once 'connection.php';
$order_id=$_POST['order_id'];

$cmd="update orders set status='delivered' where id=$order_id";

$res=mysqli_query($conn,$cmd);
if($res)
{
    header('location:view_orders.php');
}
else
{
    echo "Update Failed For order Id=$order_id";
}

