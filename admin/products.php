<?php   include "includes/adminheader.php" ?>

<body>
    <?php include "includes/adminNavbar.php"  ?>

    <div class="container">
            <div class="page-header">
                <h4><b>Products</b></h4>
            </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="success">
                    <th>Category Name</th>
                    <th>Item Name</th>
                    <th>Item Description</th>
                    <th>Item Image</th>
                    <th>Item Price</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query="SELECT * FROM `item`;";
                    $result=mysqli_query($connect,$query);
                    if(!$result){
                        echo "Query failed";
                    }
                    while($row=mysqli_fetch_assoc($result)){
                        $itemID=$row['itemID'];
                        $cName=$row['itemCatName'];
                        $itemName=$row['itemName'];
                        $itemDes=$row['itemDes'];
                        $itemImg=$row['itemImg'];
                        $itemPrice=$row['itemPrice'];

                        echo "<tr>";
                        echo "<td>{$cName}</td>";
                        echo "<td>{$itemName}</td>";
                        echo "<td>{$itemDes}</td>";
                        echo "<td><img class='img-thumbnail' width=100 src='../images/{$itemImg}'></td>";
                        echo "<td>{$itemPrice}</td>";
                        echo "<td><a href='products.php?editid={$itemID}'>
                            <button class='btn btn-primary btn-sm' ><span class='glyphicon glyphicon-edit'></span> Update</button></a>";
                        echo "<a href='products.php?deleteid={$itemID}'>
                            <button class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash'></span> Delete</button></a></td>";
                        echo "</tr>";    
                    }
                
                ?>
            </tbody>
        </table>
            <div class="form-group">
                <form action="" method="post">
                    <button class='btn btn-primary btn-sm' name="btnAdd"><span class='glyphicon glyphicon-plus'></span> Add Product</button></a></td>
                </form>
            </div>

            <?php 
                if(isset($_POST['btnAdd'])){
                    header("Location: addproduct.php");
                }
            
            ?>


            

            <?php 
                deleteItem();
    
            ?>
            <?php
                if(isset($_GET['editid'])){
                    $editId=$_GET['editid'];
                    include "editItem.php";
                }
            
            ?>




    </div> 
