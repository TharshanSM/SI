<?php   include "includes/header.php" ?>
<?php include "includes/db.php"?>

<?php 


    if(isset($_POST['btnSubmit'])){
        $firstName=$_POST['txtFname'];
        $lastName=$_POST['txtLname'];
        $username=$_POST['txtUname'];
        $emailAddress=$_POST['txtEmail'];
        $password=$_POST['txtPassword'];
        $repassword=$_POST['txtRepassword'];

        $query_u="SELECT * FROM `user` WHERE `username`='$username' ";
        $query_e="SELECT * FROM `user` WHERE `emailAddress`= '$emailAddress'";
        $result_u=mysqli_query($connect,$query_u);
        $result_e=mysqli_query($connect,$query_e);

        if(strlen($password)<6){
            echo "<div class='container alert alert-danger' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Password length should be greater than 5 characters</div>";
        }
        elseif (!preg_match('@[A-Z]@',$password)) {
            echo "<div class='container alert alert-danger' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Password Atleast contain 1 upper case letter</div>";
            
        }
        elseif (!preg_match('@[a-z]@',$password)) {
            echo "<div class='container alert alert-danger' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Password Atleast contain 1 lower case letter</div>";
        }
        elseif (!preg_match('@[0-9]@',$password)) {
            echo "<div class='container alert alert-danger' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Password Atleast contain number</div>";
        }
        else if(strcmp($password,$repassword)!=0){
            echo "<div class='container alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Password Mismatch</div>";
        }
        else if(mysqli_num_rows($result_u)>0){
            echo "<div class='container alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Username Already Exists</div>";
        }
        else if(mysqli_num_rows($result_e)>0){
            echo "<div class='container alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Email Already Exists</div>";
        }
        else{
            echo "Sucessfully Inserted";
            $query="INSERT INTO `user`( `firstName`, `lastName`, `username`, `password`, `emailAddress`, `userRole`) 
            VALUES ('{$firstName}','{$lastName}','{$username}','{$password}','{$emailAddress}','User');";
            $result=mysqli_query($connect,$query);
            if(!$result){
                echo "Query failed";
            }else{header("Location: login.php?message=Registered Successfully");}
        }
    }
?>








<body>
    <div class="container">

        <div class="page-header">
            <h4><b>Register a new membership</b></h4>
        </div>

        <div class="col-md-5 col-md-offset-3">
            <form method="post" action="" class="form-horizontal">

                <div class="form-group has-feedback">
                    <label for="">First Name</label>
                    <input type="text" name="txtFname" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="">Last Name</label>
                    <input type="text" name="txtLname" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="">Username</label>
                    <input type="text" name="txtUname" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-user form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Email Address</label>
                    <input type="email" name="txtEmail" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-user form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Password</label>
                    <input type="password" name="txtPassword" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Reconfirm Password</label>
                    <input type="password" name="txtRepassword" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <button class="btn btn-success" name="btnSubmit" >Submit</button>
                </div>

            </form>
            <div class="text-right">
                <p><a href="login.php" class="text-center">I already have a membership</a></p>
                <p><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></p>
            </div>


        </div>
    </div>

    

</body>
<?php include "includes/footer.php" ?>