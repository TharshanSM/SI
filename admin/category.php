<?php   include "includes/adminheader.php" ?>
<body>
    <?php include "adminNavbar.php"  ?>

    <div class="container">
        <div class="col-md-12">
            
            <div class="page-header">
                <h4><b>Category</b></h4>
            </div>

            <p><button class="btn btn-primary btn-md" data-toggle="modal" data-target="#addCat">
            <span class="glyphicon glyphicon-plus"></span> New</button><b>

            <!--Model for Add Category-->
            <div class="modal fade" id="addCat">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">x</button>
                            <b>Add New Category</b> 
                        </div>
                        <div class="modal-body">
                            <!--Getting Input form -->
                            <form action="category.php" method="post" class="form">
                            <div class="form-inline">
                                <label for="cat" class="control-label">Name</label>
                                <input type="text" name="txtCat" id="" class="form-control">
                                <input type="submit" class="btn btn-primary" value="Save" name="btnSubmit" onclick="<?php addCat()?>">
                            </div>
                            </form>
                        </div>
                        <!--<div class="modal-footer"></div>-->
                    </div>
                </div>
            </div>
            <!--End of Add Category Model -->

            <table class="table table-striped table-hover">
                <thead>
                    <tr class="success">
                        <th>CATEGORY NAME</th>
                        <th>TOOLS</th>
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
                        $catID=$row['catID']
                    //}
                ?>

                    <tr>
                        <!-- First Column Display Category Name-->
                        <?php echo "<td><b>{$catName}<b></td>";?>
                        <!-- Second Column Edit Delete Button-->
                        <td>
                
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editCat"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                
                                <!--Model for Edit Category-->
                                <div class="modal fade" id="editCat">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">x</button>
                                                <b>Edit Category</b> 
                                            </div>
                                            <div class="modal-body">
                                                <!--Getting Input form -->
                                                <form action="category.php" method="post" class="form">
                                                    <div class="form-inline">
                                                        <label for="cat" class="control-label">Name</label>
                                                        <input type="text" name="txtCat" id="" class="form-control">
                                                        <input type="submit" class="btn btn-primary" value="Edit" name="btnEdit" onclick="">
                                                    </div>          
                                                </form>
                                            </div>
                                            <!--<div class="modal-footer"></div>-->
                                        </div>
                                    </div>
                                </div>
                                <!--End of Edit Category Model -->

                            <!-- Delete Button-->
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCat"><span class="glyphicon glyphicon-trash"></span> Delete</button>

                              <!--Model for Delete Category-->
                              <div class="modal fade" id="deleteCat">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">x</button>
                                                <b>Delete Category</b> 
                                            </div>
                                            <div class="modal-body">
                                                <!--Getting  Input form -->
                                                    <!--<input type="submit" class="btn btn-primary" value="Delete" name="btnDelete" onclick="">-->
                                                    <?php
                                                        echo "<a href='category.php?delete={$catID}'>Delete</a>";
                                                        //<input type='button' class='btn btn-primary' value='Delete' name='btnDelete' onclick=''>
                                                    ?>
                                                
                                            </div>
                                            <!--<div class="modal-footer"></div>-->
                                        </div>
                                    </div>
                                </div>
                                <!--End of Delete Model -->

                        </td>
                    </tr>

                    <!--Ending while loop -->
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>










    <footer class="navbar navbar-default navbar-fixed-bottom ">
            <div class="container">
                <p class="text-center" style="padding: 10px"><b>Copyright © 2020 Brought to You By <a href="#">TeamSI</a></b> </p>
            </div>
        </footer>
</body>
</html>