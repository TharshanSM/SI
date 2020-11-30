<?php 
    $connect=mysqli_connect('localhost','root','','si');
    if(!$connect){
        echo "Cant connect database";
    }
?>