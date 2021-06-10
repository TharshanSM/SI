<?php   include "includes/adminheader.php" ?>

<body>
    <?php include "includes/adminNavbar.php"  ?>
    <div class="container">

    <div class="page-header">
        <h4><b>Cart Items</b></h4>
        </div>

        <!-- Form Starts  -->
        <form action="" method="post" >
            <table class="table table-striped table-hover">
            <thead>
                <tr class="success">
                    <th>Cart Ref</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query="SELECT * FROM `cart`;";
                    $result=mysqli_query($connect,$query);
                    if(!$result){
                        die("Query Failed".mysqli_error());
                    }
                    while($row=mysqli_fetch_assoc($result)){
                        $userid=$row['cart_userid'];
                        $cart_id=$row['cartid'];
                        $cart_username=$row['cart_username'];
                        $product_name=$row['cart_itemname'];
                        $quantity=$row['quantity'];
                        echo "<tr>";
                        echo "<td>{$cart_id}</td>";
                        echo "<td>{$cart_username}</td>";
                        echo "<td>{$product_name}</td>";
                        echo "<td>{$quantity}</td>";
                        //get method to make publish and draft
                        echo "<td><a href='cart.php?userid={$userid}'><button class='btn btn-success btn-sm'>Send Reply</button></a>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table></form>