<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
</head>
<style>
    body{
        background-color: #accceb;
        background-image: url('editshop.png');
        position:absolute;
        background-position-x: center;
        background-repeat: no-repeat;
        background-size: 1200px 760px;
        font-family: 'Baloo Bhai 2', cursive;

    }
    .editform{
        /* border: 5px solid white;
        border-radius:50px;
        background: #000; */
        display: inline-block;
        position: absolute;
        top: 198px;
        left: 550px;
        width: 400px;
        text-align: center;
        padding: 5px;
        
    }
    .formline1{
        background: #000;
        color:white;
        padding:5px;
        width: 300px;
        margin:3px;
        border:3px solid black ;
        border-radius:8px;
        font-size:14px;
    }
    #up{
        margin:8px;
        border-radius:10px!important;
        padding:8px!important;
        font-weight:bold;
        background: grey;
        color:black;
    }

    #up:hover{
        /* background-color: grey;
        color:black; */
        font-size:1.05em;
        font-weight:bold;
        
    }
    
</style>
<body>
<h2 style=" font-size:30px; position:absolute; top:25px; left:570px; width:500px; ">EDIT THE PRODUCT DETAILS</h2>

<?php
include_once 'connection.php';

$id=$_GET['pid'];
if(isset($_GET['delete']))
{    

    $cmd="delete from products where id=$id";
    $res=mysqli_query($conn,$cmd);
    header('location:view_products.php');

}
else if(isset($_GET['edit']))
{
    $sql_res=mysqli_query($conn,"select * from products where id=$id");
    $row=mysqli_fetch_assoc($sql_res);
    $name=$row['name'];
    $desc=$row['description'];
    $price=$row['price'];
    $imname=$row['imname'];

    echo "
    <form class='editform' method='POST' action='update.php'>

        <input class='formline1' name='pid' value='$id' hidden>
        <br>
        <input class='formline1' name='name' value='$name'>
        <br>
        <input class='formline1' name='description' value='$desc'>
        <br>
        <input class='formline1' name='price' value='$price'>
        <br>
        <img style='width:150px;margin:8px; border:2px solid black' src='$imname'>
        <br>

        <input id='up' type='submit' value='Update'>


    </form>
    ";


}
    ?>
</body>
</html>

