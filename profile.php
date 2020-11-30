<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<body>

    <?php   include "includes/navbar.php" ?>
        
    <div class="container">
        <div class="page-header">
            <h4><b>Welcome Back! <?php echo $_SESSION['username']?></b></h4>
        </div>   
    <div class="col-md-8">

        <div class="panel panel-success">
            <!-- <div class="panel-heading">
                <h4><b>Become a Subscriber</b></h4>
            </div> -->
            <div class="panel-body">
                <?php 
                    $username=$_SESSION['username'];
                    $query="SELECT * FROM `user` WHERE `username`='{$username}';";
                    $result=mysqli_query($connect,$query);
                    if(!$result){
                        echo "Query failed";
                    }
                    //Display the Categories
                    while($row=mysqli_fetch_assoc($result)){
                        $userid=$row['userID'];
                        $firstName=$row['firstName'];
                        $lastName=$row['lastName'];
                        $username=$row['username'];
                        $password=$row['password'];
                        $emailAddress=$row['emailAddress'];
                    }
                ?>


                <p><h5>First Name: <?php echo $firstName?></h5></p>
                <p><h5>Last Name: <?php echo $lastName?></h5></p>
                <p><h5>Username: <?php echo $username?></h5></p>
                <p><h5>Email Address: <?php echo $emailAddress?></h5></p>

                <a href="profile.php?editid=<?php echo $userid?>"><button class='btn btn-primary btn-sm' class="btnEdit"><span class='glyphicon glyphicon-edit'></span> Edit Info</button></a>
                
                
            </div>
            <!-- <div class="panel-footer"></div> -->
        </div>
        <?php 
        if(isset($_GET['editid'])){
            include "includes/edituser.php";
        }

    ?>

    </div>

    

    <div class="col-md-4">
        <?php 
            include "panel.php";
        ?>
    </div>
    
    </div>
    