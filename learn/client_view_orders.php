<?php 

    session_start();
    
    include 'client.html' ?>

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
                 <!-- <p> <?php $u=$_SESSION['username']; echo "$u" ?></p>  -->
                <h1>Order History</h1>
                <form action='expire_session.php'>
                    <button> Logout </button>
                </form>
            
</div>


<?php


    $uname=$_SESSION['username'];


    include_once 'connection.php';
    $cmd="select * from orders where cname='$uname'";
    $sql_res=mysqli_query($conn,$cmd);

    echo "<table class='table'>
    
        <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>Delivery Address</th>
                    <th>Status</th>
                </tr>
        </thead>

        <tbody>
    ";
    while($row=mysqli_fetch_assoc($sql_res))
    {
        $order_id=$row['id'];
        $pid=$row['pid'];
        $name=$row['cname'];
        $address=$row['caddress'];
        $mobile=$row['cmobile'];
        $status=$row['status'];

        echo "<tr>
                <form method='POST' action='change_order_status.php'>
                <td>
                    <input name='order_id' value='$order_id' hidden> 
                    $order_id
                </td>                
                <td> <a href='view_single_product.php?pid=$pid'> $pid </a>  </td>
                <td>$name</td>
                <td>$mobile</td>
                <td>$address</td>
                <td> $status </td>
                </form>
        </tr>";
    }
    echo '
        </tbody>
        </table>';

?>


</body>
</html>
