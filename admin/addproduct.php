<?php include "includes/adminheader.php" ?>


<?php 
    if(isset($_POST['btnSubmit'])){

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

        $query="INSERT INTO `item`(`itemCatName`, `itemName`, `itemImg`, `itemDes`, `itemPrice`) VALUES 
        ('{$catName}','{$itemName}','{$itemImg}','{$itemDes}','{$itemPrice}');";
        $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error($connect));
            }
            else{header("Location: products.php");}
    }



?>

<body>
    <?php include "includes/adminNavbar.php"  ?>
    <div class="container">
        <div class="page-header">
            <h4><b>Add Products</b></h4>
        </div>
    <div class="col-md-5 col-md-offset-4">  
    <form action=""  method="post" enctype="multipart/form-data">





            <div class="form-group">
                <label for="Category Name">Category Name</label>
                <!--<input type="text" name="selectCat" id="" class="form-control">-->
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
                    
                <!--<select name="selectCat" id="" class="form-control" >
                    <option value="1">Teddy</option>
                    <option value="2">Teddy</option>
                </select>-->
                </select>
                        
            </div>










            <div class="form-group ">
                <label for="">Item Name</label>
                <input type="text" name="txtItemName" id="" class="form-control">
            </div>
            <div class="form-group ">
                <label for="">Add Image</label>
                <input type="file" name="fileImage" id="" class="form-control">
            </div>
            <div class="form-group ">
                <label for="">Description</label>
                <textarea name="txtDes" id="editor" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group ">
                <label for="">Price</label>
                <input type="number" name="txtPrice" id="" class="form-control">
            </div>
            <div class="form-group ">
                <input type="submit" value="Submit" name="btnSubmit" class="btn btn-primary form-control" >
            </div>
        </form> 
    </div>
    </div>


  

