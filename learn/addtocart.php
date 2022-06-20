<?php
session_start();

$id=$_POST['pid'];


if(isset($_SESSION['id']))
{
    //echo "NEXT Time";
    $res=in_array($id,$_SESSION['id']);
    
    if($res)
    {
        echo "<script> alert('Pdt Alrady Added to CART'); </script>";
    }
    else
    {

        array_push($_SESSION['id'],$id);
        header('location:client_view_products.php');
    }
    
}
else
{
    //echo "First Time";
    $_SESSION['id']=array($id);
    header('location:client_view_products.php');
}

    
    



