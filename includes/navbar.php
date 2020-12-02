<?php include "modal.php" ?>
<?php include "db.php" ?>
<?php include "userfunctions.php" ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" >
            <div class="navbar-header ">
                <a class="navbar-brand"  href="index.php">SI</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">CONTACT US</a></li>

                <!-- Dropdown  -->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
                    <ul class="dropdown-menu">  
                        <?php 
                            $query="SELECT * FROM `category`;";
                            $result=mysqli_query($connect,$query);
                            if(!$result){
                                echo "Query failed";
                            }
                            //Display the Categories
                            while($row=mysqli_fetch_assoc($result)){
                                $cat=$row['catName'];
                                $catid=$row['catID'];
                                echo "<li><a href='itemlist.php?catName={$cat}'>{$cat}</a></li>";
                            }
                            /* 
                            <li><a href="#">Jewellery</a></li>
                            <li><a href="#">Jewellery</a></li>
                            <li><a href="#">Jewellery</a></li>
                            */
                        ?>
                        <li class="divider"></li>
                        <li><a href="#">View All Products</a></li>
                    </ul>
                </li>
            </ul>

            <!--if the category dropdown list selected-->
            <?php 
                if(isset($_GET['catName'])){
                    $catName=$_GET['catName'];
                }      
            ?>
                    

            <!--Navigation bar Right   -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="cart.php" class="glyphicon glyphicon-shopping-cart"></a></li>

                <!-- <li><a href="login.php">LOGIN</a></li>
                <li><a href="register.php">REGISTER</a></li> -->

                <?php 
                    if(isset($_SESSION['username'])){
                        echo "<li><a href='profile.php'>PROFILE</a></li>";
                        echo "<li><a href='logout.php'>LOG OUT</a></li>";
                    }else{
                        echo "<li><a href='login.php'>LOGIN</a></li>";
                        echo "<li><a href='register.php'>REGISTER</a></li>";
                    }
                
                ?>
            </ul>
        </div>
    </nav>