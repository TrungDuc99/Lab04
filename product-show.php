<?php 
require_once('entities/product.class.php');
require_once('entities/category.class.php');
?>
<?php 
include_once("header.php");
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()
if(!isset($_GET["cateid"])){
	$prods = Product::list_product();
}else{
	$cateid	= $_GET["cateid"];
	$prods = Product::list_product_by_cateid($cateid);
}
	
	 if ($_GET['delid']!= null){
		$pro_id = $_GET['delid'];
		echo"$pro_id";
	   // $delpd = $pro_id ->del_product($id);
	} 
$cates = Category::list_category();
?>

<div class="container text-center form-text">
	<div class="col-md-3">
		<h3>Danh mục</h3>
		<ul class="list-group">
			<?php
				foreach($cates as $item){
					echo "<li class = 'list-group-item'><a href=/Lab4/product-list.php?cateid=".$item["CateID"]."> ".$item["CategoryName"]."</a></li>";
				}?>
		</ul>
	</div>
	<div class="col-md-12">
		<h3>Sản phẩm cửa hàng</h3><br>
		<div class="row">
			<?php foreach ($prods as $item) { ?>
			<div class="col-sm-4">
			<img src="/Lab4/<?php echo $item["Picture"];?>" width="100px" height="100px" alt="">
			<p class="text-danger"><?php echo $item["ProductName"]; ?></p>
			<p class="text-info"><?php echo $item["Price"]; ?></p>
			<p>
				<h5>
					<a href="product_detail.php?id=<?php echo $item['ProductID']?>" class="chitiet">
						<button>Chi tiết</button>
					</a>
				</h5>
			</p>
			<p>
            <td><a href='/Lab4/product-edit.php?id=<?php echo $item["ProductID"]; ?>'">Edit</a> || <a onclick=" return confirm('Are you sure you want to delete this')" href="?delid=<?php echo $item['ProductID']?>">Delete</a></td>			</p>
		</div>
		<?php } ?>
		</div>

	</div>
</div>
<?php include_once("footer.php"); ?>