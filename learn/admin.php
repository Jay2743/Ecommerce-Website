<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-color: #e2fffed6 !important;
        font-family: 'Baloo Bhai 2', cursive !important;
    }

    .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
        font-size: 19px;
        font-weight: bold;
        margin: 2px;
        padding: 0px 10px 0px 10px !important;

    }

    .btn:not(:disabled):not(.disabled):hover {
        background-color: white;
        color: black !important;

    }

    .bg-primary {
        background-color: black !important;
        font-weight: bold !important;
    }

    .jumbotron {
        background-color: #ffefc1 !important;

    }

    #logo {
        height: 34px;
        position: absolute;
        right: 10px;
    }
</style>

<body>

    <div class="d-flex justify-content-start bg-primary py-2">

        <button class="btn text-white" onclick="location='fileinput.php'"> Upload Product</button>
        <button class="btn text-white" onclick="location='view_products.php'"> View products</button>
        <button class="btn text-white" onclick="location='view_orders.php'"> View Orders</button>
        <img id="logo" src="logo.png" alt="loading">

    </div>

</body>

</html>