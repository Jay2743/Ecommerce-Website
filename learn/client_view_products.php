<?php

session_start();
if(!isset($_SESSION['username']))
{
    echo "<h1 style='color:tomato'>Login to Access this Page</h1>";
    die;
}

include 'client.html';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">



    <style>
            .pdt_parent{
                border:2px solid #888888 ;
                display:inline-block;
                padding:10px;
                margin:20px;
                box-shadow: 5px 8px #888888;
                width:300px;
                text-align:center;
            }

            .small
            {
                width:200px;
                height:227px
            }
            body{
                    background-color: #e2fffed6!important;
                    font-family: 'Baloo Bhai 2', cursive!important;
                    text-align:center;
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
                <p> <?php $u=$_SESSION['username']; echo "$u" ?></p>
                <h1>Purchase Products</h1>
                <form action='expire_session.php'>
                    <button> Logout </button>
                </form>
            <div class='d-flex justify-content-end'>
                <button  onclick="opencart()" class='btn bg-danger text-white' > <i class='fa fa-shopping-cart'> </i> 
                        <?php                                            
                            if(isset($_SESSION['id']))
                            {
                                    echo count($_SESSION['id']);
                            }
                            else
                            {
                                echo "0";
                            }
                        ?> 
                </button>
        </div>
</div>

<div class='d-flex justify-content-center'>
    <form class='w-50 d-flex' method='GET' >
            <input name='search' class='form-control' placeholder='Search here' style='font-size:24px;border:1px solid #555;'>
            <input type='submit' class='ml-2 btn btn-primary'>
    </form>
</div>

<script>

function opencart()
{
    window.location="client_view_cart.php";
}

</script>
    
</body>
</html>

<?php

include_once 'connection.php';

// 1.'select every products'
// 2.'Render it as an HTML'
// 3.'Add a ADD to CART BUTTON'

if(isset($_GET['search']))
{
    $searchterm=$_GET['search'];
}
else
{
    $searchterm='';
}


$sql_res=mysqli_query($conn,"select * from products where name like '%$searchterm%' ");

while($row=mysqli_fetch_assoc($sql_res))
{

    $id=$row['id'];
    $name=$row['name'];
    $desc=$row['description'];
    $price=$row['price'];
    $imname=$row['imname'];

    echo "
        <div class='pdt_parent'>
            <div class='d-flex justify-content-around bg-light text-primary'>
                <h2> $name </h2>
                <h2> $price </h2>
            </div>
            <img class='small' src='$imname'>
            <p class='text-center'> $desc </p>

            <form method='POST' action='addtocart.php'>
                <input value='$id' name='pid' hidden>
                <button name='add' class='w-100 btn btn-success py-3'>Add to CART</button>
            </form>

        </div>    
    ";

}