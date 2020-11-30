<?php   include "includes/adminheader.php" ?>
<?php 

if(isset($_POST['checkboxArray'])){
    foreach ($_POST['checkboxArray'] as $key ) {
        $options=$_POST['options'];
        switch ($options) {
            case 'Published':
                $query="UPDATE `comment` SET `comment_status`='Published' WHERE `comment_id`={$key}";
                $result=mysqli_query($connect,$query);
                if(!$result){
                    die("Query Failed".mysqli_error());
                }
                break;

            case 'Draft':
                $query="UPDATE `comment` SET `comment_status`='Draft' WHERE `comment_id`={$key}";
                $result=mysqli_query($connect,$query);
                if(!$result){
                    die("Query Failed".mysqli_error());
                }
                break;

            case 'Delete':
                $query="DELETE FROM `comment` WHERE `comment_id`={$key}";
                $result=mysqli_query($connect,$query);
                if(!$result){
                    die("Query Failed".mysqli_error());
                }
                break;

            default:
                echo "<div class='alert alert-danger container'><a href='#' class='close' data-dismiss='alert'>&times;</a>Please Select Option</div>";
        }
    }
}

?>



<body>
    <?php include "includes/adminNavbar.php"  ?>
    <div class="container">

    <div class="page-header">
        <h4><b>Comments</b></h4>

        <!-- Form Starts  -->
        <form action="" method="post" >
        <div class="col-md-3" >
            <select name="options" id="options" class="form-control">
                <option value="">Select Option</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
                <option value="Delete">Delete</option>
            </select>
        </div>
            <button name='submitCheckBox' class='btn btn-primary btn-sm form-inline'><span class='glyphicon glyphicon-ok'></span> Apply</button></a></td>
            <button class='btn btn-primary disabled btn-sm '><span class='glyphicon glyphicon-plus '></span> Add Comment</button></a></td>
    </div>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr class="success">

                <th>
                    <input type="checkbox" name="chkcheckbox" id="chkcheckbox">
                </th>

                <th>Product</th>
                <th>Author Name</th>
                <th>Email</th>
                <th>Message </th>
                <th>Date</th>
                <th>Status</th>
                <th>Tools</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query="SELECT * FROM `comment`;";
                $result=mysqli_query($connect,$query);
                if(!$result){
                    die("Query Failed".mysqli_error());
                }
                while($row=mysqli_fetch_assoc($result)){
                    $comment_id=$row['comment_id'];
                    $comment_pid=$row['comment_pid'];
                    $comment_author=$row['comment_author'];
                    $comment_emailid=$row['comment_emailid'];
                    $comment_msg=$row['comment_msg'];
                    $comment_status=$row['comment_status'];
                    $comment_date=$row['comment_date'];


                    echo "<tr>";
                    ?>
                    
                    
                    <td>
                    <input type='checkbox' class="checkboxes" name='checkboxArray[]' id='' value=<?php echo $comment_id ?> >
                    </td>
                     


                    <?php
                    echo "<td><a href='#'>View Product</a></td>";
                    echo "<td>{$comment_author}</td>";
                    echo "<td>{$comment_emailid}</td>";
                    echo "<td>{$comment_msg}</td>";
                    echo "<td>{$comment_date}</td>";
                    echo "<td>{$comment_status}</td>";
                    
                    //get method to make publish and draft
                    echo "<td><a href='comment.php?publish_comment={$comment_id}'><button class='btn btn-info btn-sm'>Publish</button></a>";
                    echo " <a href='comment.php?draft_comment={$comment_id}'><button class='btn btn-info btn-sm'>Draft</button></a>";
                    echo " <a href='comment.php?reply_comment={$comment_id}'><button class='btn btn-success btn-sm'>Reply</button></a></td>";
                    echo "<td><a href='comment.php?delete_comment={$comment_id}'>
                        <button class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash'></span> Delete</button></a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <!-- Form ends -->
    </form> 
   
    
            <?php deleteComment() ?>
            <?php 
                //make comment published and draft
                if(isset($_GET['publish_comment'])){
                    $commentid=$_GET['publish_comment'];
                    $query="UPDATE `comment` SET `comment_status`='Published' WHERE `comment_id`={$commentid}";
                    $result=mysqli_query($connect,$query);
                    if(!$result){
                        die("Query Failed".mysqli_error());
                    }
                    header("Location:comment.php");

                }

                if(isset($_GET['draft_comment'])){
                    $commentid=$_GET['draft_comment'];
                    $query="UPDATE `comment` SET `comment_status`='Draft' WHERE `comment_id`={$commentid}";
                    $result=mysqli_query($connect,$query);
                    if(!$result){
                        die("Query Failed".mysqli_error());
                    }
                    header("Location:comment.php");
                }
            ?>        
    </div>

    <script src="js/scripts.js"></script>