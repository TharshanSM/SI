<?php 
    if(isset($_GET["editid"])){
        $editid=$_GET['editid'];
        $query="SELECT * FROM `category` WHERE `catID` = $editid;";
        $result=mysqli_query($connect,$query);
        if(!$result){
            die("Query Failed".mysqli_error());
        }
        while($row=mysqli_fetch_assoc($result)){
            $catName=$row['catName'];
            $catID=$row['catID'];
?>
    
        <div class="container">
            <div class="col-md-6">
                <form action="" method="post" class="form">
                <div class="form-group">
                    <label for="cat" class="control-label">Update Category</label>
                    <input type="text" name="txtUpdate" id="" class="form-control" value="<?php {echo $catName;}?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="btnUpdate" value="Update">
                </div>
                </form>
            </div>
        </div>

    <?php 
    }}
    ?>

    <?php 
    
        if(isset($_POST['btnUpdate'])){
            $updateCat=$_POST['txtUpdate'];
            $query="UPDATE `category` SET `catName`='{$updateCat}' WHERE `catID` ={$editid}";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }else{
                header("Location: category_copy.php");
            }
        }
    ?>
