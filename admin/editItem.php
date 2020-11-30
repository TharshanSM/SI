<div class="col-md-5 col-md-offset-3">
<div class="panel panel-primary">

    <div class="panel-heading">
        <h4><b>Edit Product</b></h4>
    </div>

    <div class="panel-body">

    <?php

        if(isset($_POST['btnUpdate'])){
        
            $select=$_POST['selectCat'];
            $query="SELECT * FROM `category` where `catID`={$select};";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }
            while($row=mysqli_fetch_assoc($result)){
                $catName=$row['catName'];
            }

            $itemName=$_POST['txtItemName'];

            $itemImg=$_FILES['fileImage']['name'];
            $itemImgTemp=$_FILES['fileImage']['tmp_name'];

            $itemDes=$_POST['txtDes'];
            $itemPrice=$_POST['txtPrice'];
            move_uploaded_file($itemImgTemp,"../images/$itemImg");

            $query="UPDATE `item` SET `itemCatName`='{$catName}',
            `itemName`='{$itemName}',`itemImg`='{$itemImg}',`itemDes`='{$itemDes}',`itemPrice`='{$itemPrice}' WHERE `itemID`='{$editId}'";

            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }else{header("Location: products.php");}
        }
    ?>




    <?php 
        $query="SELECT * FROM `item` WHERE `itemID`='{$editId}';";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failes".mysqli_error());
        }
        while($row=mysqli_fetch_assoc($result)){
            $catName=$row['itemCatName'];
            $itemName=$row['itemName'];
            $itemDes=$row['itemDes'];
            $itemImg=$row['itemImg'];
            $itemPrice=$row['itemPrice'];
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group ">
                <label for="Category Name">Category Name</label>
                <select name="selectCat" id="" class="form-control" >

                    <?php 
                        $query="SELECT * FROM `category`;";
                        $result=mysqli_query($connect,$query);
                        if(!$result){
                            die("Query Failed".mysqli_error());
                        }
                        while($row=mysqli_fetch_assoc($result)){
                            $catid=$row['catID'];
                            $catname=$row['catName'];
                            echo "<option value='{$catid}'>{$catname}</option>";
                        }
                    ?>

                </select>
            </div>

            <div class="form-group ">
                <label for="">Item Name</label>
                <input type="text" value=<?php echo $itemName?> name="txtItemName" id="" class="form-control">
            </div>

            <div class="form-group ">
                <label for="">Edit Image</label>
                <img src="../images/<?php echo $itemImg ?>" class="thumbnail" width="100" alt="">
                <input type="file" name="fileImage" id="" class="form-control">
            </div>

            <div class="form-group ">
                <label for="">Description</label>
                <textarea name="txtDes" id="" cols="30" rows="5" class="form-control"><?php echo $itemDes ?></textarea>
            </div>

            <div class="form-group ">
                <label for="">Price</label>
                <input type="number" value=<?php echo $itemPrice ?> name="txtPrice" id="" class="form-control">
            </div>

            <div class="form-group ">
                <input type="submit" value="Update" name="btnUpdate" class="btn btn-primary form-control" >
            </div>

        </form> 
    </div>  
    </div>

    <div class="panel-footer"></div>

</div>








































