<?php
$conn=new mysqli('localhost','root','','acme_nov');
if($conn->error)
{
    echo "SQL Connection Failed";
    die;
}