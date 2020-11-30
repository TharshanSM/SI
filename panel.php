


<!--1st Panel  -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4><b>Trending</b></h4>
    </div>
    <div class="panel-body">
        <?php 
            //$query="SELECT * FROM `item`";
            $query="SELECT * FROM `item` WHERE `itemViewCount`> 1 ORDER BY `itemViewCount` DESC";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }
            while($row=mysqli_fetch_assoc($result)){
                $itemID=$row['itemID'];
                $itemName=$row['itemName'];
                $itemPrice=$row['itemPrice'];
                //$itemDes=$row['itemDes'];
                //$itemImg=$row['itemImg'];
                echo "<p><input type='checkbox' name='' id='checked' checked='true'> <a href='moredetails.php?itemid={$itemID}'>{$itemName}</a></p>";
            }
        ?>
    </div>
    




    <div class="panel-footer"></div>
</div>










<!--2nd Panel  -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4><b>Become a Subscriber</b></h4>
    </div>
    <div class="panel-body">
        <p>Get free updates on the latest products and discounts, straight to your inbox.</p>
    </div>
    <div class="panel-footer"></div>
</div>







<!--3rd Panel  -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4><b>Follow us on Social Media</b></h4>
    </div>
    <div class="panel-body">
        <p>Panel Body</p>
    </div>
    <div class="panel-footer"></div>
</div>

