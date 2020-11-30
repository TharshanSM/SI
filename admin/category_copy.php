<?php   include "includes/adminheader.php" ?>

<body>
    <?php include "includes/adminNavbar.php"  ?>

    <div class="container">
        <div class="page-header">
            <h4><b>Category</b></h4>
        </div>

        <?php 
            addCat();
        ?>

        <div class="col-md-6">
            <form action="category_copy.php" method="post" class="form">
                <div class="form-group">
                    <label for="cat" class="control-label">Add Category</label>
                    <input type="text" name="txtCat" id="" class="form-control">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="btnSubmit" value="Add">
                </div>
            </form>
        </div>




        <div class="col-md-6">
            <table class="table table-striped table-hover">

                <thead>
                    <tr class="success">
                        <th>Category Name</th>
                        <th>Tools</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    $query="SELECT * FROM `category`;";
                    $result=mysqli_query($connect,$query);
                    if(!$result){
                        echo "Query failed";
                    }
                    while($row=mysqli_fetch_assoc($result)){
                        $catName=$row['catName'];
                        $catID=$row['catID'];
                        echo "<tr>";
                        echo "<td><b>{$catName}<b></td>";
                        echo "<td><a href='category_copy.php?editid={$catID}'>
                            <button class='btn btn-primary btn-sm' ><span class='glyphicon glyphicon-edit'></span> Update</button></a>";
                        echo "<a href='category_copy.php?deleteid={$catID}'>
                            <button class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash'></span> Delete</button></a></td>";
                        echo "</tr>";
                    } 
                ?>
                </tbody>
            </table>
        </div>
    </div>
                        <?php 
                            deleteCat()
                        ?>

                        <?php
                            if(isset($_GET['editid'])){
                                $catid_update=$_GET['editid'];
                                include "includes/updateCat.php";
                            }
                        
                        ?>

<?php include "includes/adminFooter.php"?>
