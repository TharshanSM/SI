<?php   include "includes/header.php" ?>
<body>
    <?php   include "includes/navbar.php" ?>
    <?php 
        if(isset($_GET['message'])){
            echo "<div class='container alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>x
            </a>Logout Successfully</div>";
        }
    
    
    ?>

    <div class="container">
        <div class="col-md-8">
            <div id="carousel" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" ></li>
                    <li data-target="#carousel" data-slide-to="1" class="active"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item ">
                        <img src="images/img5.jpg" alt="">
                    </div>
                    <div class="item active">
                        <img src="images/img4.jpg" alt="">
                        <div class="carousel-caption">
                            <h3 >Welcome!!!!</h3>
                            <button class="btn btn-info">More Info</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/img5.jpg" alt="">
                    </div>
                </div>  

                <!--Carousel prev / next icon   -->
                <a href="#carousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" area-hidden="true"></span>
                </a>
                <a href="#carousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" area-hidden="true"></span>
                </a>
            </div>
        </div>
        <!--Panel Column tab  -->
        <div class="col-md-4">
            <?php include "panel.php" ?> 
        </div>
    </div>
<?php include "includes/footer.php" ?>