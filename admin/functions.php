<?php 
    function addCat(){
        global $connect;
        if(isset($_POST["btnSubmit"])){  
            $cat=$_POST["txtCat"];
            if($cat=="" || empty($cat)){
                echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>Field Cannot be Empty</div>";
            }else{
                $query="INSERT INTO `category`(`catName`) VALUES ('$cat');";
                $result=mysqli_query($connect,$query);
                if(!$result){
                    die("Query Failed".mysqli_error());
                }else{
                    echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert'>&times;</a>Add Successfully</div>";
                    header("Location: category_copy.php");
                } 
            }
        }
    }

    function deleteCat(){
        global $connect;
        if(isset($_GET["deleteid"])){  
            $catDel=$_GET["deleteid"];
            $query="DELETE FROM `category` WHERE `catID`={$catDel}";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }
            header("Location: category_copy.php");
        }
    } 
    
    function deleteItem(){
        global $connect;
        if(isset($_GET["deleteid"])){  
            $itemDel=$_GET["deleteid"];
            $query="DELETE FROM `item` WHERE `itemID`={$itemDel}";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }else{
                header("Location: products.php");
            } 
        }
    }

    function deleteUser(){
        global $connect;
        if(isset($_GET["deleteid"])){  
            $deluser=$_GET["deleteid"];
            $query="DELETE FROM `user` WHERE `userID`={$deluser}";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }else{
                header("Location: users.php?source=viewUser");
            } 
        }

    }

    function deleteComment(){
        global $connect;
        if(isset($_GET["delete_comment"])){  
            $comment_id=$_GET["delete_comment"];
            $query="DELETE FROM `comment` WHERE `comment_id`={$comment_id}";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }else{
                header("Location: comment.php");
            } 
        }

    }










?>

