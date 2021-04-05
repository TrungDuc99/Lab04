<?php 
require_once("entities/product.class.php");
require_once('entities/category.class.php');

if(isset($_POST["btnSubmit"])){
        // echo "aaaaa";
        $productName = $_POST["txtName"];
        $cateID      = $_POST["txtCateID"];
        $price       = $_POST["txtPrice"];
        $quantity    = $_POST["txtQuantity"];
        $description = $_POST["txtDesc"];
        $picture     = $_FILES["txtPicture"];
        // echo gettype( $picture );
        // foreach ( $picture as $item ){
        //     echo  $item->name ;
        // }
        // echo  $picture ;
        $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
        
        $result = $newProduct->save();

        if(!$result){
            header("Location: product-add.php?failure");
        }else{
            header("Location: product-add.php?inserted");
        }
    }
?>
<?php
    include_once('header.php')
?>
<?php
    if(isset($_GET["inserted"])){
        echo "<h2> Them san pham thanh cong </h2>";
    }
?>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ten San Pham</label>
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ;?>" class="form-control" id="lblinput" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label">Mo ta san pham</label>
            <input type="text" name="txtDesc" value="<?php echo isset($_POST["txtDesc"]) ? $_POST["txtDesc"] : "" ;?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Danh muc</label>
            <select class="form-select" aria-label="Default select example" name="txtCateID">
                <?php 
                    $cates = Category::list_category();
                    foreach ( $cates as $item){
                        echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
                    }
                ?>
            </select>
            <!-- <input type="text" name="txtCateID" value="<?php echo isset($_POST["txtCateID"]) ? $_POST["txtCateID"] : "" ;?>" class="form-control" id="exampleInputPassword1"> -->
        </div><div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gia</label>
            <input type="text" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : "" ;?>" class="form-control" id="exampleInputPassword1">
        </div><div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">So luong</label>
            <input type="text" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : "" ;?>" class="form-control" id="exampleInputPassword1">
        </div><div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Hinh anh</label>
            <input type="file" accept=".PNG,.GIF,.JPG" id="txtPicture" name="txtPicture" value="<?php echo isset($_POST["txtPicture"]) ? $_POST["txtPicture"] : "" ;?>" class="form-control" id="exampleInputPassword1"> 
        </div>
        <input type="submit" name="btnSubmit" class="btn btn-primary"></input>
    </form>
</div>

<?php
    include_once('footer.php')
?>
