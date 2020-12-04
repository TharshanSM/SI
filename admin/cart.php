<?php   include "includes/adminheader.php" ?>
<?php 





?>

<body>
    <?php include "includes/adminNavbar.php"  ?>
    <div class="container">

    <div class="page-header">
        <h4><b>Comments</b></h4>

        <!-- Form Starts  -->
        <form action="" method="post" >
            <table class="table table-striped table-hover">
            <thead>
                <tr class="success">
                    <th>User ID</th>
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
                        $user_id=$row['cart_userid'];
                        $product_id=$row['cart_itemid'];
                        $quantity=$row['quantity'];
                        echo "<tr>";
                        echo "<td>{$user_id}</td>";
                        echo "<td>{$user_id}</td>";
                        echo "<td>{$product_id}</td>";
                        echo "<td>{$quantity}</td>";
                        //get method to make publish and draft
                        echo "<td><a href='cart.php?sendmessage={$user_id}'><button class='btn btn-success btn-sm'>Send Reply</button></a>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table></form>