<?php

include_once 'connection.php';

$name=$_POST['iname'];
$desc=$_POST['idescription'];
$price=$_POST['iprice'];

 
 $fname=date('Y_m_d_h_i_s').'.jpg';
  move_uploaded_file($_FILES['myfile']['tmp_name'],$fname);

 $cmd="insert into products(name,description,price,imname) 
                    values('$name','$desc',$price,'$fname')";
 $sql_status=mysqli_query($conn,$cmd);

 if($sql_status)
 {
     echo "Product Uploaded Successfully";
     echo "<a href='fileinput.php'>Go to Products</a>";
 }
 else
 {
     echo "Product Failed to Update!!";
 }

