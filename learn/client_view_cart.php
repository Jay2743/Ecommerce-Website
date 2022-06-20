<?php

session_start();
if(!isset($_SESSION['username']))
{
    echo "<h1 style='color:tomato'>Login to Access this Page</h1>";
    die;
}

    include 'client.html';
    $TOTAL=0;
?>
<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
<head>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
            .pdt_parent{
                border:2px solid #888888 ;
                display:inline-block;
                padding:10px;
                margin:20px;
                box-shadow: 5px 8px #888888;
            }

            .small
            {
                width:200px;
            }
            body{
                    background-color: #e2fffed6!important;
                    font-family: 'Baloo Bhai 2', cursive!important;
                }

.small_img
    {
    width:300px;     
    padding:5px;  
    height:275px;             
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    font-size: 19px;
    font-weight:bold;
    margin:2px;
    padding:0px 10px 0px 10px!important;

}

.btn:not(:disabled):not(.disabled):hover {
    background-color: white;
    color:black!important;

}

.bg-primary {
    background-color: black!important;
    font-weight:bold!important;
}

.jumbotron {
    background-color: #ffefc1!important;

}

    </style>

    
</head>
<body>

<div class='jumbotron'>

                <h1>View CART</h1>
                <form action='expire_session.php'>
                    <button> Logout </button>
                </form>     
                <div class='d-flex justify-content-end'>
                        <h1 id='disp'>  </h1>
                        
                        <button onclick="location='place_order.php'" class='ml-5 btn btn-primary '> Place Order </button>
                </div>       
</div>
</body>
<?php

include_once 'connection.php';


if(isset($_SESSION['id']))
{
        $ids=$_SESSION['id'];        
        for($i=0;$i<count($ids);$i++)
        {
            $id=$ids[$i];
            $cmd="select * from products where id=$id";
            $sql_res=mysqli_query($conn,$cmd);
            $row=mysqli_fetch_assoc($sql_res);

                $id=$row['id'];
                $name=$row['name'];
                $desc=$row['description'];
                $price=$row['price'];
                $imname=$row['imname'];

                $TOTAL=$TOTAL+$price;
                echo "
                    <div class='pdt_parent'>
                        <div class='d-flex justify-content-around bg-light text-primary'>
                            <h2> $name </h2>
                            <h2> $price </h2>
                        </div>
                        <img class='small' src='$imname'>
                        <p class='text-center'> $desc </p>

                        <form method='POST' action='client_cart_delete.php'>
                            <input value='$id' name='pid' hidden>
                            <button name='add' class='w-100 btn btn-danger py-3'>Remove Item</button>
                        </form>

                    </div>    
                ";
            

        }
        echo "<script> document.getElementById('disp').innerHTML='Rs.$TOTAL' </script>";
        

}
else
{
    echo "<h1 class='bg-danger text-white'> Cart is Empty</h1>";
}