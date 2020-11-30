<?php   include "includes/header.php" ?>
<?php   include "includes/db.php" ?>

<body>
    <div class="container">
    <?php 
        if(isset($_POST['btnSubmit'])){
        $uname=mysqli_real_escape_string($connect,$_POST['txtUsername']);
        $password=mysqli_real_escape_string($connect,$_POST['txtPassword']);

        $query="SELECT * FROM `user` WHERE `username`='{$uname}'";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failed".mysqli_error());
        }

        while($row=mysqli_fetch_assoc($result)){
            $db_userid=$row['userID'];
            $db_email=$row['emailAddress'];
            $db_pass=$row['password'];
            $db_username=$row['username'];
            $db_firstName=$row['firstName'];
            $db_userrole=$row['userRole']; 
        }

        //login validation
        if($uname==$db_username && $password!=$db_pass){
            echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Incorrect Password</div>";
        }else if($uname==$db_username && $password==$db_pass && $db_userrole=='User'){
            $_SESSION['userID']=$db_userid;
            $_SESSION['username']=$db_username;
            $_SESSION['email']= $db_email;
            $_SESSION['userRole']=$db_userrole;
            header("Location: profile.php");
        }else if($uname==$db_username && $password==$db_pass && $db_userrole=='Admin'){
            header("Location: admin/index.php");
            //echo "Admin";
        }else{
            header("Location: login.php");
        }
    }  

    ?>
        <div class="page-header">
            <h4><b>Sign in to start your session</b></h4>
        </div>

        <div class="col-md-5 col-md-offset-3">
            <form action="" method="post" class="form-horizontal">

                <div class="form-group has-feedback">
                    <label for="">Username</label>
                    <input type="text" name="txtUsername" id="" class="form-control">
                    <span class="glyphicon glyphicon-envelope form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Password</label>
                    <input type="password" name="txtPassword" id="" class="form-control">
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <button class="btn btn-success" name="btnSubmit">Submit</button>
                </div>

            </form>
            <div class="text-right">
                <p><a href="#" class="text-center">I forgot my password</a></p>
                <p><a href="register.php" class="text-center">Register a new membership</a></p>
                <p><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></p>
            </div>
        </div>
    </div>
</body>