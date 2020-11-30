<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<body>
    <?php   include "includes/navbar.php" ?>
    <div class="container">
        <div class="col-md-8">

            <div class="page-header">
                <h4><b>Products</b></h4>
            </div>


            <!-- to View Category from database -->
            <?php 
                $query="SELECT * FROM `item` WHERE `itemCatName`='$catName';";
                $result=mysqli_query($connect,$query);
                if(!$result){
                    echo "Query failed";
                }
                while($row=mysqli_fetch_assoc($result)){
                    $itemid=$row['itemID'];
                    $itemName=$row['itemName'];
                    $itemPrice=$row['itemPrice'];
                    $itemDes=$row['itemDes'];
                    $itemImg=$row['itemImg'];
                //}
            ?>

            <div class="col-md-4">
                <div class="panel panel-primary">
                     <div class="panel-body">
                        <img src="images/<?php echo $itemImg  ?>" class="thumbnail" alt="">
                        <a href="moredetails.php?itemid=<?php echo $itemid?>"><b><?php echo $itemName ?></b></a>
                    </div>
                    <div class="panel-footer">
                        <b>RS <?php echo $itemPrice ?></b>
                    </div>
                </div>
            </div>

            <!-- Completing the while loop-->
            <?php } ?>
            
        </div>
        <div class="col-md-4">
            <?php include "panel.php" ?> 
        </div>
    </div>

    <!-- pagination -->
    <div class="text-center">
        <ul class="pagination pagination-lg">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
    </div>
    


    <?php include "includes/footer.php" ?>