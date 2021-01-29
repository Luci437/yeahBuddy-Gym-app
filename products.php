<?php

    include('commonPartTop.php');

?>

<div class="trainerMainBox">
    <h1 class="trainerTitle">OUR PRODUCTS</h1>
    <h4 class="trainerSubTitle">Offers a Complete Range of Fitness Accessories and Equipment for a Smooth and Enjoyable
        Fitness Journey</h4>
    <div class="allProductsMainBox">

    <?php
        require('includes/db.inc.php');

        $sql = 'SELECT * FROM product';
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="eachProductBox">
            <h4 class="prdName">'.$row['prdName'].'</h4>
            <h3 class="prdPrice">₹<span>'.$row['prdPrice'].'</span></h3>
            <div class="productImageBox">
                <img class="prdImage" src="'.$row['prdImage'].'" alt="">
            </div>
            <button class="addToCartButton">Cart Now <i class="fas fa-shopping-cart cartButtonIcon"></i></button>
            </div>
            ';
        }

        ?>

    </div>
</div>

<?php
    include('commonPartBottom.php');
?>