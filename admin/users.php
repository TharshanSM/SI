<?php   include "includes/adminheader.php" ?>

<body>
    <?php include "includes/adminNavbar.php"  ?>
    <div class="container">
        
    <?php 
        $source=$_GET['source'];
        switch($source){

            case 'addUser':
                include "includes/addUser.php";
            break;
            case 'deleteUser':
                deleteUser();
            break;

            case 'editUser':
                include "includes/editUser.php";
            break;

            default:
                include "includes/viewUser.php";
            break;
        }
    ?>
     
    </div>
