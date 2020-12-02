<?php   include "../includes/db.php" ?>
<?php 
    if(isset($_POST['btnSubmit'])){
        header("Location: ../index.php?message=LogOut Successfully");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    </head>
<body >

    <div class="container">
        <div class="jumbotron">
            <h4 class="text-center">Overall Status</h4>

            <form action="" method="post">
                <button class="btn btn-danger float-right" name="btnSubmit" >Logout</button>
            </form>

            <!-- <ul>
            <li><a href="#">Logout</a></li>
            <li><a href="#">Home</a></li>
            </ul> -->
            <!-- <a href=""><h4 class="text-right">Admin Index</h4></a> -->
        </div>

        

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="card-title"><h4>Total Categories</h4></div>
                        <?php 
                            $query="SELECT * FROM `category`";
                            $result=mysqli_query($connect,$query);
                            $count_category=mysqli_num_rows($result);
                        ?>
                        <div class="card-text"><h1><?php echo $count_category?></h1></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="category_copy.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="card-title"><h4>Total Products</h4></div>
                        <?php 
                            $query="SELECT * FROM `item`";
                            $result=mysqli_query($connect,$query);
                            $count_item=mysqli_num_rows($result);
                        ?>
                        <div class="card-text"><h1><?php echo $count_item?></h1></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="products.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="card-title"><h4>Total Users</h4></div>
                        <?php 
                            $query="SELECT * FROM `user`";
                            $result=mysqli_query($connect,$query);
                            $count_user=mysqli_num_rows($result);
                        ?>
                        <div class="card-text"><h1><?php echo $count_user?></h1></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="users.php?source=viewUser">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">

                        <div class="card-title"><h4>Cart Items</h4></div>
                        <?php 
                            $query="SELECT * FROM `cart`";
                            $result=mysqli_query($connect,$query);
                            $count_cart=mysqli_num_rows($result);
                        ?>
                        <div class="card-text"><h1><?php echo $count_cart?></h1></div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="cart.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">

                        <div class="card-title"><h4>Comments</h4></div>
                        <?php 
                            $query="SELECT * FROM `comment`";
                            $result=mysqli_query($connect,$query);
                            $comment_=mysqli_num_rows($result);
                        ?>
                        <div class="card-text"><h1><?php echo $comment_?></h1></div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="comment.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">

                        <div class="card-title"><h4 class="F">Published</h4></div>
                        <?php 
                            $query="SELECT * FROM `comment` WHERE `comment_status`='Published'";
                            $result=mysqli_query($connect,$query);
                            $comment_Published=mysqli_num_rows($result);
                        ?>
                        <div class="card-text"><h1><?php echo $comment_Published?></h1></div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="comment.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">

                        <div class="card-title"><h4>Unpublished</h4></div>
                        <?php 
                            $query="SELECT * FROM `comment` WHERE `comment_status`='Draft'";
                            $result=mysqli_query($connect,$query);
                            $comment_Draft=mysqli_num_rows($result);
                        ?>
                        <div class="card-text"><h1><?php echo $comment_Draft?></h1></div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="comment.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
















        </div>

        <!-- Google Chart -->
        <div class="row">
        
        <div class="col-md-5">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],
                    <?php 
                        $elementTitle=array("Category","Products","Users","Cart","Comments","Published Comments","Unpublished Comments");
                        $elementCount=array($count_category,$count_item,$count_user,$count_cart,$comment_,$comment_Published,$comment_Draft);
                        for($i=0;$i<count($elementTitle);$i++){
                            echo "['{$elementTitle[$i]}'".","."{$elementCount[$i]}],";
                        }
                        
                    ?>
                    ]);

                
                    var options = {
                    chart: {
                        title: 'Status',
                        subtitle: '',
                    }
                    };
                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>
        <div id="columnchart_material" style="width: auto; height: 500px;"></div>
    </div>
    </div>
</div>
</body>
</html>


   
    
    
    
