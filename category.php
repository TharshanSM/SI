<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<pre><?php  print_r($_SESSION)?></pre>

<?php  
    
    $query="SELECT * FROM `cart` LEFT JOIN `item` ON cart.cart_itemid=item.itemID";
    $result=mysqli_query($connect,$query);
    if(!$result){
        die("Query Failed".mysqli_error());
    }
    while($row=mysqli_fetch_assoc($result)){
        $userid=$row['userID'];
        $firstName=$row['firstName'];
        $lastName=$row['lastName'];
        $username=$row['username'];
        $password=$row['password'];
        $emailAddress=$row['emailAddress'];
    }






?>