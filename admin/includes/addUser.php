<?php 
    if(isset($_POST['btnSubmit'])){
        $firstName=$_POST['fname'];
        $lastName=$_POST['lname'];
        $username=$_POST['username'];
        $emailAddress=$_POST['email'];

        if(strcmp($_POST['password'],$_POST['repassword'])==0){
            $password=$_POST['password'];
        }else{
            //echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Password Mismatch</div>";
        }

        $query="INSERT INTO `user`( `firstName`, `lastName`, `username`, `password`, `emailAddress`, `userRole`)
        VALUES ('{$firstName}','{$lastName}','{$username}','{$password}','{$emailAddress}','User');";
        $result=mysqli_query($connect,$query);
        if(!$result){
            echo "Query failed";
        }else{header("Location: users.php?source=viewUser");}
    }

?>

<div class="page-header">
        <h4><b>Add User</b></h4>
</div>

<div class="col-md-5 col-md-offset-3">

    <form action="" method="post" class="form-horizontal">

        <div class="form-group has-feedback">
            <label for="">First Name</label>
            <input type="text" name="fname" id="" class="form-control" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <label for="">Last Name</label>
            <input type="text" name="lname" id="" class="form-control" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
             <label for="">Username</label>
            <input type="text" name="username" id="" class="form-control" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <label for="">Email Address</label>
            <input type="email" name="email" id="" class="form-control" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback">
        </div>

        <div class="form-group has-feedback">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" required>
            <span class="glyphicon glyphicon-lock form-control-feedback">
        </div>

        <div class="form-group has-feedback">
            <label for="">Confirm Password</label>
            <input type="repassword" name="repassword" id="" class="form-control" required>
            <span class="glyphicon glyphicon-lock form-control-feedback">
        </div>

        <div class="form-group has-feedback">
            <button class="btn btn-success" name="btnSubmit"><span class="glyphicon glyphicon-ok"></span> Submit</button>
            <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>

    </form>
</div>