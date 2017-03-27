$(document).ready(function(){
	categories();
	brands();
	products();
	function categories(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {category:1},
			success: function(data){
				$("#get_category").html(data);
			}

		})

	}

	function brands(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {brand:1},
			success: function(data){
				$("#get_brands").html(data);
			}

		})

	}

	function products(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {getProduct:1},
			success: function(data){
				$("#get_product").html(data);
			}

		})

	}

	$("body").delegate(".category", "click", function(event){
		event.preventDefault();
		var category_id = $(this).attr('category_id');
		$.ajax({

			url: "action.php",
			method: "POST",
			data: {get_selected_category:1, cat_id:category_id},
			success: function(data){
				$("#get_product").html(data);
			}
		})
	})

	$("body").delegate(".brand", "click", function(event){
		event.preventDefault();
		var brand_id = $(this).attr('brand_id');
		$.ajax({

			url: "action.php",
			method: "POST",
			data: {get_selected_brand:1, brand_id:brand_id},
			success: function(data){
				$("#get_product").html(data);
			}
		})
	})

	$("#search_btn").click(function(){
		var keyword = $("#search").val();
		if(keyword != ""){

			$.ajax({

			url: "action.php",
			method: "POST",
			data: {get_product_search:1, searchFor:keyword},
			success: function(data){
				$("#get_product").html(data);
			}
		})

		}

	})

})