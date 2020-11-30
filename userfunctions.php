<?php
    function removeCart(){
        global $connect;
        if(isset($_GET['removeid'])){
            if(isset($_SESSION['userID'])){
                $query="DELETE FROM `cart` WHERE `cart_itemid` = {$_GET['removeid']}";
                $result=mysqli_query($connect,$query);
                if(!$result){
                    die("Query Failed".mysqli_error());
                }
            }else{
                foreach ($_SESSION['cart'] as $key => $value) {
                    if($value['itemid']==$_GET['removeid']){
                        unset($_SESSION['cart'][$key]);
                    }
                }
            }
            header("Location:cart.php");   
        }
    }

    function getItem(){
        global $connect;
        $itemid=$_GET['itemid'];
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
    }

    function addCart(){
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
                        die("Query Failed".musqli_error());
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
    }

?>