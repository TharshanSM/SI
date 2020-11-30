<?php   include "includes/header.php" ?>
<body>
    <div class="container">

        <div class="page-header">
            <h4><b>Register a new membership</b></h4>
        </div>

        <div class="col-md-5 col-md-offset-3">
            <form action="" class="form-horizontal">

                <div class="form-group has-feedback">
                    <label for="">First Name</label>
                    <input type="text" name="txtFname" id="" class="form-control">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="">Last Name</label>
                    <input type="text" name="txtLname" id="" class="form-control">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="">Username</label>
                    <input type="email" name="txtUname" id="" class="form-control">
                    <span class="glyphicon glyphicon-user form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Email Address</label>
                    <input type="email" name="txtEmail" id="" class="form-control">
                    <span class="glyphicon glyphicon-user form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Password</label>
                    <input type="password" name="txtPassword" id="" class="form-control">
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <label for="">Reconfirm Password</label>
                    <input type="password" name="txtRepassword" id="" class="form-control">
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <button class="btn btn-success" name="btnSubmit">Submit</button>
                </div>

            </form>
            <div class="text-right">
                <p><a href="login.php" class="text-center">I already have a membership</a></p>
                <p><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></p>
            </div>


        </div>
    </div>

    

</body>