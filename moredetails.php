<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

<?php 
    //comment
     if(isset($_POST['btnCommentSubmit'])){
        $itemid=$_GET['itemid'];
        $name=$_POST['txtName'];
        $email=$_POST['txtEmail'];
        $message=$_POST['txtMessage'];

        $query="INSERT INTO `comment`( `comment_pid`, `comment_author`, `comment_emailid`, `comment_msg`, `comment_status`, `comment_date`)
        VALUES ({$itemid},'{$name}','{$email}','{$message}','Draft',now())";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failed".mysqli_error());
        }
        //echo "<div class='container alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Post Successfully</div>";
        header("Location:moredetails.php?itemid={$itemid}"); 
    }
    ?>

<?php 
    $itemid=$_GET['itemid'];

    $query="UPDATE `item` SET `itemViewCount`=`itemViewCount`+ 1 WHERE `itemID` = '$itemid'";
    $result=mysqli_query($connect,$query);
    if(!$result){
        die("Query Failed".mysqli_error());
    }


    $query="SELECT * FROM `item` WHERE `itemID`='$itemid';";
    $result=mysqli_query($connect,$query);
    if(!$result){
        die("Query Failed".mysqli_error());
    }
    while($row=mysqli_fetch_assoc($result)){
        $itemName=$row['itemName'];
        $itemPrice=$row['itemPrice'];
        $itemDes=$row['itemDes'];
        $itemImg=$row['itemImg'];
    }
?>

<?php
// if theres user session exists it will be store in database otherwise it create a session
if(isset($_POST['btnAddCart'])){
    if(isset($_SESSION['userID'])){
        $itemid=$_GET['itemid'];
        $query="SELECT * FROM `cart` WHERE `cart_itemid`='{$itemid}'";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failed".mysqli_error());
        }
        if(mysqli_num_rows($result)>0){
            echo "<div class='container alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Item Already in Cart</div>";
        }else{
            $userid=$_SESSION['userID'];
            $query="INSERT INTO `cart`(`cart_userid`, `cart_itemid`, `quantity`) VALUES ('{$userid}','{$_GET['itemid']}','{$_POST['txtQty']}')";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }
            echo "<div class='container alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Add Successfully</div>";
        }

    }else if(isset($_SESSION['cart'])){
        $item_arrayid=array_column($_SESSION['cart'],'itemid');
        if(!in_array($_GET['itemid'],$item_arrayid)){
            $count=count($_SESSION['cart']);
            $cart=array(
                'itemid' => $_GET['itemid'],
                'itemname' => $itemName,
                'itemprice' => $itemPrice,
                'itemquantity' => $_POST['txtQty'],
                'itemimg' => $itemImg
    
            );
            $_SESSION['cart'][$count]=$cart;
            echo "<div class='container alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Add Successfully</div>";
        }else{
            echo "<div class='container alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Item Already in Cart</div>";
        }
    }else{
            $cart=array(
                'itemid' => $_GET['itemid'],
                'itemname' => $itemName,
                'itemprice' => $itemPrice,
                'itemquantity' => $_POST['txtQty'],
            );
            $_SESSION['cart'][0]=$cart;
            echo "<div class='container alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>Add Successfully</div>";
        }
    }
?>



<body> 
    <?php   include "includes/navbar.php" ?>
    <div class="container">
        <div class="page-header">
            <h4><b><?php echo $itemName?></b></h4>
        </div>
    <div class="row">
        <div class="col-md-8">
            <div>
                <img src="images/<?php echo $itemImg?>" class="img-thumbnail" height="300px" alt="">
            </div>
            <form action="" method="post" >
                <div class="form-group">
                    <!-- <label for="">Enter Quantity</label> -->
                    <input type="number" name="txtQty" id="" min="1" max="10" class="form-control" placeholder="Enter Quantity" required>   
                </div>
                <div class="form-group">
                    <a href='moredetails.php?itemid=<?php echo $itemid?>'>
                    <button class='btn btn-primary btn-sm form-control' name='btnAddCart'><span class='glyphicon glyphicon-shopping-cart'></span> Add to Cart</button></a>
                </div>
            </form>
        </div>
        <div class="col-md-4"><?php include "panel.php"?></div>
    </div>
    <!-- Row  Ending -->
    <!-- Comment Menu -->
    <div class="row" ></div>
        <div class="col-sm-8">
        <div class="page-header">
                <h4><b>Suggestions & Comments</b></h4>
            </div> 
            <div class="well">
                <h3>Leave a Comment</h3>
                <form action="" method="post">

                    <div class="form-group">
                        <label for="" >Name</label>
                        <input type="text" name="txtName" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="txtEmail" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea name="txtMessage" id="" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" name="btnCommentSubmit">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <!-- Posted Comments -->
            <!-- Comment -->
            <div class="page-header">
                <h4><b>Viewers Comments</b></h4>
            </div>  
            <?php 
                
                $query="SELECT * FROM `comment` WHERE `comment_pid`={$itemid} AND `comment_status`= 'Published' ORDER BY `comment_id` DESC ";
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
            ?>

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_author?>
                        <small><?php echo $comment_date?></small>
                    </h4>
                    <?php echo $comment_msg?>
                </div>
            </div>
        <?php }?>
        </div>


    </div>
    




    

    