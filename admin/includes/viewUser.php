<div class="page-header">
    <h4><b>Users</b></h4>
    <a href='users.php?source=addUser'>
    <button class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-plus'></span> Add User</button></a></td>
    <a href='../admin/report.php'>
    <button class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-file'></span> Generate User Details</button></a></td>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr class="success">
            <th>First Name</th>
            <th>Last Name </th>
            <th>User Name</th>
            <th>Email Address</th>
            <th>Role</th>
            <th>Tools</th>
            <th>Edit Role</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query="SELECT * FROM `user`;";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }
            while($row=mysqli_fetch_assoc($result)){
                $userid=$row['userID'];
                $fname=$row['firstName'];
                $lname=$row['lastName'];
                $uname=$row['username'];
                $email=$row['emailAddress'];
                $role=$row['userRole'];


                echo "<tr>";
                echo "<td>{$fname}</td>";
                echo "<td>{$lname}</td>";
                echo "<td>{$uname}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$role}</td>";
                echo "<td><a href='users.php?source=editUser&editid={$userid}'>
                    <button class='btn btn-primary btn-sm' ><span class='glyphicon glyphicon-edit'></span> Update</button></a>";
                echo "<a href='users.php?source=deleteUser&deleteid={$userid}'>
                    <button class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash'></span> Delete</button></a></td>";

                echo "<td><a href='users.php?changerole_user={$userid}'><button class='btn btn-info btn-sm'>User</button></a>";
                //get method to make admin
                echo " <a href='users.php?changerole_admin={$userid}'><button class='btn btn-info btn-sm'>Admin</button></a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php 
    //make user role admin and user
    if(isset($_GET['changerole_user'])){
        $editid=$_GET['changerole_user'];
        $query="UPDATE `user` SET `userRole`='User' WHERE `userID`='{$editid}'";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failed".mysqli_error());
        }
        header("Location:users.php?source=viewUser");

    }

    if(isset($_GET['changerole_admin'])){
        $editid=$_GET['changerole_admin'];
        $query="UPDATE `user` SET `userRole`='Admin' WHERE `userID`='{$editid}'";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failed".mysqli_error());
        }
        header("Location:users.php?source=viewUser");

    }










?>