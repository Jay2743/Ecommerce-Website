<?php
session_start();
if(!isset($_SESSION['username']))
{
    echo "<h1 style='color:tomato'>Login to Access this Page</h1>";
    die;
}
include_once 'connection.php';

$uname=$_SESSION['username'];
//Validation of Proucts Before Placing the Order

if(!isset($_SESSION['id']))
{
    echo "<h1 style='color:tomato'> Sorry!! Cannot Place Empty Orders </h1>";
    die;
}
$ids=$_SESSION['id'];
if(count($ids)==0)
{
    echo "<h1 style='color:tomato'> Sorry!! Cannot Place Empty Orders </h1>";
       die;
}

//Extract the User info

$q="select * from users where username='$uname'";
$acc_res=mysqli_query($conn,$q);
$user_row=mysqli_fetch_assoc($acc_res);
$mobile=$user_row['mobile'];
$address=$user_row['address'];


for($i=0;$i<count($ids);$i++)
{
    $id=$ids[$i];
    $cmd="insert into orders(pid,cname,cmobile,caddress) values($id,'$uname','$mobile','$address')";
    $res=mysqli_query($conn,$cmd);
    if(!$res)
    {
        echo "Something Went Wrong";
        die;
    }    
}

$_SESSION['id']=array();
echo "Order Placed Successfully!";
echo "<a href='client_view_products.php'>Go to Products</a>";
