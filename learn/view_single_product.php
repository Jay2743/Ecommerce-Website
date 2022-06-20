<!DOCTYPE html>
<html lang="en">
<head>
    <style>
            .small_img
                {
                    width:300px;     
                    padding:5px;               
                                       
                }

                .pdt{
                        display:inline-block;
                        text-align:center;
                        text-transform:uppercase;
                        letter-spacing:5px;
                        border:2px solid green;
                        margin:10px; 
                }
                .action_but
                {
                    display:flex;
                    justify-content:space-around;
                    background-color:tomato;
                }
        </style>
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    
</body>
</html>


<?php

include 'admin.html';
include_once 'connection.php';

if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    $cmd="select * from products where id=$pid";
    $sql_res=mysqli_query($conn,$cmd);


    $cnt=mysqli_num_rows($sql_res);
    if($cnt==0)
    {
        echo "No Product Found!";
        die;
    }
    $row=mysqli_fetch_assoc($sql_res);
    $name=$row['name'];
    $price=$row['price'];
    $desc=$row['description'];
    $imname=$row['imname'];
    
    echo "<div class='pdt'>
    <div class='d-flex justify-content-around bg-warning'>
        <h3>$name</h3>
        <h3 class='text-danger '><span style='font-size:16px'>Rs.</span>$price</h3>
        </div>

        <img class='small_img' src='$imname'>
        <p>$desc</p>
       
    </div>";

}
else
{
    echo "Requires a Product ID";
}