<?php
    include('adminTop.php');
?>
<style>
.activeProduct {
    background: linear-gradient(to right, rgba(246, 179, 34, 0.2) 10%, transparent);
    border-left: 4px solid rgb(246, 179, 34);
    color: rgb(246, 179, 34);
}

.activeProduct:hover {
    color: rgb(246, 179, 34);
    background: linear-gradient(to right, rgba(246, 179, 34, 0.2) 10%, transparent);
}
</style>
<div class="contentBox">
    <div class="titleBox">
        <div class="titleImageBox"></div>
        <div class="titleDetailsBox">
            <p>You are at</p>
            <p>Add Products Channel</p>
        </div>
        <a href="#" class="addButton"><i class="fas fa-plus pdspace"></i> ADD PRODUCTS</a>
    </div>
    <!-- content box -->
    <div class="mainContentBoxAdd">
        <form action="addProduct.inc.php" method="post" class="addForm" enctype="multipart/form-data">
            <h2>Add New Products</h2>
            <div class="inputMainBox">
                <input type="text" required name="prdName" id="regFirst" class="inputInput">
                <label for="regFirst" class="inputLabel">Product Name</label>
            </div>
            <div class="inputMainBox">
                <input type="text" required name="prdDesc" id="desc" class="inputInput">
                <label for="desc" class="inputLabel">Description</label>
            </div>
            <div class="inputMainBox">
                <input type="text" required name="prdPrice" id="regLast" class="inputInput">
                <label for="regLast" class="inputLabel">Price</label>
            </div>
            <div class="inputMainBox">
                <input type="text" required name="prdQty" id="phone" class="inputInput">
                <label for="phone" class="inputLabel">Quantity</label>
            </div>
            <div class="inputMainBox">
                <input type="file" required name="image" id="regEmail" class="inputInput">
            </div>
            <button class="submitButton" name="submitAdd">Add Product</button>
        </form>
    </div>
</div>
<?php
    include('adminBottom.php');
?>