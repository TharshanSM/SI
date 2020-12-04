<!--cart page-->
<?php   include "includes/header.php" ?>
<?php include "includes/db.php"?>

<body>
    <?php   include "includes/navbar.php" ?>
    <div class="container">
        <div class="header">
            <div class="page-header">
                <h4><b>Your Cart</b></h4>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr class="success">
                        <th></th>
                        <th>ITEM NAME</th>
                        <th>ITEM PRICE</th>
                        <th>QUANTITY</th>
                        <th>SUB TOTAL</th>
                    </tr>
                </thead>
                <tbody>                                          
                <?php
                    if(isset($_SESSION['userID'])){
                        $userid=$_SESSION['userID'];
                        $query="SELECT * FROM `cart` LEFT JOIN `item` ON cart.cart_itemid=item.itemID";
                        $result=mysqli_query($connect,$query);
                        if(!$result){
                            die("Query Failed".mysqli_error());
                        }
                        $total=0;
                        while($row=mysqli_fetch_assoc($result)){
                            $cart_itemid=$row['cart_itemid'];
                            $itemName=$row['itemName'];
                            $itemPrice=$row['itemPrice'];
                            $quantity=$row['quantity'];
                           
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td>{$itemName}</td>";
                            echo "<td>{$itemPrice}</td>";
                            echo "<td>{$quantity}</td>";
                            $subtotal=number_format($itemPrice*$quantity);
                            echo "<td>{$subtotal}</td>";
                            echo "<td><a href='cart.php?removeid={$cart_itemid}'><button class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash'></span>  Remove</button></a></td>";
                            echo "</tr>";
                            $total=$total+$itemPrice*$quantity;
                            
                        }
                        echo "<tr>";
                        echo "<td colspan='4' class='text-right'><b>Total</b></td>";
                        echo "<td>{$total}</td></tr>";
                        echo "</tr>";
                    }else if(!empty($_SESSION['cart'])){
                        $total=0;
                        foreach ($_SESSION['cart'] as $key => $values) {
                ?>
                    <tr>
                        <td></td>
                        <!-- <td><img src="images/<?php echo $values['itemimg']?>" alt="" class="thumbnail" height="100"></td> -->
                        <td><?php echo $values['itemname']?></td>
                        <td><?php echo $values['itemprice']?></td>
                        <td><?php echo $values['itemquantity']?></td>
                        <td><?php echo number_format($values['itemquantity'] * $values['itemprice'])?></td>
                        <td><a href="cart.php?removeid=<?php echo $values['itemid']?>"><button class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash'></span>  Remove</button></a></td>
                    </tr>

                    <?php
                            $total=$total +  $values['itemquantity'] * $values['itemprice'];
                            }
                    ?>

                    <tr>
                        <td colspan="4" class="text-right"><b>Total</b></td>
                        <td><?php echo $total?></td></tr>
                    </tr>
                    <?php }?>    
                </tbody>
            </table>

            <?php 
                if(!isset($_SESSION['userID'])){
                    echo "<h4>You need to <a href='login.php'>Login</a> to Proceed.</h4>"; 
                }else{
                    echo "<h4>Generate<a href='User_FPDF/ex.php?userid={$userid}'> Invoie</a></h4>";
                }
            ?>





            
        </div>

        <?php removeCart()?>



        <div class="col-md-4">
        <?php include "panel.php" ?>
        </div>        
    </div>
    <?php include "includes/footer.php" ?>
</body>