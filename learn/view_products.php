<?php  include 'admin.php' ?>
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

                .pdt{
                        display:inline-block;
                        text-align:center;
                        text-transform:uppercase;
                        letter-spacing:5px;
                        border:4px solid black;
                        /* border-radius:12px; */
                        margin:14px; 
                    
                }
                .action_but
                {
                    display:flex;
                    justify-content:space-around;
                    background-color:tomato;
                }
        </style>

    
</head>
<body>    
    <div class="jumbotron text-center">
        <h1>View Products</h1>
        
            </div>
</body>
</html>

<?php

include_once 'connection.php';
$sql_result=mysqli_query($conn,'select * from products');

while($row=mysqli_fetch_assoc($sql_result))
{
    $id=$row['id'];
    $imname=$row['imname'];
    $name=$row['name'];
    $desc=$row['description'];
    $price=$row['price'];

    echo "<div class='pdt'>
    <div class='d-flex justify-content-around bg-warning'>
        <h3>$name</h3>
        <h3 class='text-danger '><span style='font-size:16px'>Rs.</span>$price</h3>
        </div>

        <img class='small_img' src='$imname'>
        <p>$desc</p>
        <div class='action_but'>
        <form method='GET' action='actionphp.php'>
            <input value='$id' hidden name='pid'>
            <button type='submit' name='edit'   class='btn text-white'> <i class='fa  fa-edit'> </i>   </button>
            <button type='submit' name='delete' class='btn text-white'> <i class='fa fa-trash'> </i>  </button>
        </form>
        </div>
    </div>";
}