<?php  include 'admin.php' ?>
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
        background-color: #00b2e6!important;
        background-image: url(lapfile.png);
        position:absolute;
        background-repeat: no-repeat;
        background-size: 1200px 760px;
        font-family: 'Baloo Bhai 2', cursive;
    }

.w-25{
    background-color:black!important;
    border: 5px solid white;
    border-radius:25px;
    position:absolute;
    left:950px;
    top:160px;
    width:500px!important;
}
.form-control{
    margin:10px;
    border: 2px solid black;
    padding:2px;
    width: 375px;
    border-radius: 10px;
    padding-left:10px;

}

.py-2{
    width:1536px;
    background-color: black!important;

}
.text-white {
    color: white!important;
    font-size:18px;
    margin-right:20px;
    margin-left:5px;
    font-weight:bold;
    padding:2px 10px 2px 10px;
}

.text-white:hover {
    color: black!important;
    background-color: white;
}
#upload{
    background-color:#09ff00; 
    border:2px solid white; 
    border-radius:50px; 
    font-size:20px; 
    color:black; 
    font-weight:bold; 
    margin-top:35px;
}
#upload:hover{
    background-color:#8d82ff; 
    
}

</style>


<body>
    
<div class=" mt-5">
    
<form class="p-5 bg-primary w-25" enctype="multipart/form-data" method="post" action="upload.php">
    <h2 class='admin' style="font-size:36px; text-align:center; color:white; font-weight:bold; margin-bottom:18px ">ADMIN UPLOAD FORM</h2>
    <input class='form-control' name='iname' autocomplete="off" placeholder="Item Name">
    
    <textarea class='form-control' name='idescription' placeholder="Item Discription"></textarea>
    
    <input class='form-control' type="number" name='iprice' placeholder="Item Price">
    
    <input class='form-control' type='file' name='myfile' placeholder="Attach file here">
    
    <input id="upload" class='form-control' type='submit' name='submit' value='UPLOAD'>
</form>

</div>
</body>
</html>