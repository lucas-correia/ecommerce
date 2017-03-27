<?php
include "db.php";
if(isset($_POST["category"])){
	
	header('Content-Type: text/html; charset=utf-8');
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));

	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categorias</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$category_id = $row["cat_id"];
			$category_name = $row["cat_title"];
			echo "
				<li><a href='#' class='category' category_id='$category_id'>$category_name</a></li>
			";
		}
		echo "</div>";
	}

}

if(isset($_POST["brand"])){
	
	header('Content-Type: text/html; charset=utf-8');
	$brands_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brands_query) or die(mysqli_error($con));

	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Marcas</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while ($row = mysqli_fetch_array($run_query)) {
			$brand_id = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
				<li><a href='#' class='brand' brand_id='$brand_id'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}

}

if(isset($_POST["getProduct"])){
	$product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
	$run_query = mysqli_query($con, $product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while ($row = mysqli_fetch_array($run_query)) {
			$product_id = $row['product_id'];
			$product_cat = $row['product_cat'];
			$product_brand = $row['product_brand'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
			$product_image = $row['product_image'];

			echo "
				<div class='col-md-4'>
							<div class='panel panel-info' style='width:230;'>
								<div class='panel-heading'>$product_title</div>
								<div class='panel-body'>
									<img src='product_images/$product_image' style='width:180px; height:280px;'/>
								</div>
								<div class='panel-heading'>$$product_price
									<button pid='$product_id' style='float:right; margin-left:3px;' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-shopping-cart' style='height:18px; padding-top:2px;'></span></button>
									<button pid='$product_id' style='float:right;' class='btn btn-danger btn-xs'>Detalhes</button>
								</div>
							</div>
						</div>
					</div>
			";
		}
	}
}

if(isset($_POST["get_selected_category"])){
	$cid = $_POST["cat_id"];
	$sql = "SELECT * FROM products where product_cat = $cid";
	$run_query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($run_query)) {
			$product_id = $row['product_id'];
			$product_cat = $row['product_cat'];
			$product_brand = $row['product_brand'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
			$product_image = $row['product_image'];

			echo "
				<div class='col-md-4'>
							<div class='panel panel-info' style='width:230;'>
								<div class='panel-heading'>$product_title</div>
								<div class='panel-body'>
									<img src='product_images/$product_image' style='width:180px; height:280px;'/>
								</div>
								<div class='panel-heading'>$$product_price
									<button pid='$product_id' style='float:right; margin-left:3px;' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-shopping-cart' style='height:18px; padding-top:2px;'></span></button>
									<button pid='$product_id' style='float:right;' class='btn btn-danger btn-xs'>Detalhes</button>
								</div>
							</div>
						</div>
					</div>
			";
		}
}

if(isset($_POST["get_selected_brand"])){
	$bid = $_POST["brand_id"];
	$sql = "SELECT * FROM products where product_brand = $bid";
	$run_query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($run_query)) {
			$product_id = $row['product_id'];
			$product_cat = $row['product_cat'];
			$product_brand = $row['product_brand'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
			$product_image = $row['product_image'];

			echo "
				<div class='col-md-4'>
							<div class='panel panel-info' style='width:230;'>
								<div class='panel-heading'>$product_title</div>
								<div class='panel-body'>
									<img src='product_images/$product_image' style='width:180px; height:280px;'/>
								</div>
								<div class='panel-heading'>$$product_price
									<button pid='$product_id' style='float:right; margin-left:3px;' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-shopping-cart' style='height:18px; padding-top:2px;'></span></button>
									<button pid='$product_id' style='float:right;' class='btn btn-danger btn-xs'>Detalhes</button>
								</div>
							</div>
						</div>
					</div>
			";
		}
}

if(isset($_POST["get_product_search"])){
	$sea = $_POST["searchFor"];
	$sql = "SELECT * FROM products where product_keywords like '%$sea%'";
	$run_query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($run_query)) {
			$product_id = $row['product_id'];
			$product_cat = $row['product_cat'];
			$product_brand = $row['product_brand'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
			$product_image = $row['product_image'];

			echo "
				<div class='col-md-4'>
							<div class='panel panel-info' style='width:230;'>
								<div class='panel-heading'>$product_title</div>
								<div class='panel-body'>
									<img src='product_images/$product_image' style='width:180px; height:280px;'/>
								</div>
								<div class='panel-heading'>$$product_price
									<button pid='$product_id' style='float:right; margin-left:3px;' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-shopping-cart' style='height:18px; padding-top:2px;'></span></button>
									<button pid='$product_id' style='float:right;' class='btn btn-danger btn-xs'>Detalhes</button>
								</div>
							</div>
						</div>
					</div>
			";
		}
}


?>