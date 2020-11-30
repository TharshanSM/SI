<?php
    $editid=$_GET['editid'];
    $query="SELECT * FROM `user` WHERE `userID`='{$editid}';";
    $result=mysqli_query($connect,$query);
    if(!$result){
        die("Query Failes".mysqli_error());
    }
    while($row=mysqli_fetch_assoc($result)){
        $firstName=$row['firstName'];
        $lastName=$row['lastName'];
        $username=$row['username'];
        //$password=$row['password'];
        $emailAddress=$row['emailAddress'];
    }
?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h4><b>Update</b></h4>
    </div>
    <div class="panel-body">
    <?php
    $editid=$_GET['editid'];
    $query="SELECT * FROM `user` WHERE `userID`='{$editid}';";
    $result=mysqli_query($connect,$query);
    if(!$result){
        die("Query Failes".mysqli_error());
    }
    while($row=mysqli_fetch_assoc($result)){
        $firstName=$row['firstName'];
        $lastName=$row['lastName'];
        $username=$row['username'];
        //$password=$row['password'];
        $emailAddress=$row['emailAddress'];
    }

    if(isset($_POST['btnSubmit'])){
        $editid=$_GET['editid'];
        $firstName=$_POST['fname'];
        $lastName=$_POST['lname'];
        $username=$_POST['username'];
        $emailAddress=$_POST['email'];

        if(strcmp($_POST['password'],$_POST['repassword'])==0){
            $password=$_POST['password'];
        }else{
            //echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Password Mismatch</div>";
        }

        $query="UPDATE `user` SET `firstName`='{$firstName}',`lastName`='{$lastName}',`username`='{$username}',`password`='{$password}',`emailAddress`='{$emailAddress}',`userRole`='User' 
        WHERE `userID`='{$editid}'";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failed".mysqli_error());
        }else{
            $_SESSION['username']=$username;
            header("Location: profile.php");
        }
    }

?>

        <div class="col-md-5 col-md-offset-3">

            <form action="" method="post" class="form-horizontal">

                <div class="form-group has-feedback">
                    <label for="">First Name</label>
                    <input type="text" name="fname" id="" value="<?php echo $firstName?>" class="form-control" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" id="" value="<?php echo $lastName?>" class="form-control" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" value="<?php echo $username?>" class="form-control"required >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="">Email Address</label>
                    <input type="email" name="email" id="" value="<?php echo $emailAddress?>" class="form-control" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Type New Password</label>
                    <input type="password" name="password" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Confirm New Password</label>
                    <input type="password" name="repassword" id="" class="form-control" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <button class="btn btn-success" name="btnSubmit"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                </div>
            </form>
        </div>


    </div>
    <!-- <div class="panel-footer"></div> -->
</div>
