class Cart {
  
  public function addItem() {
        $quantity = $_POST['quantity'];
		if ($quantity == "") {
			$quantity = "1";
		}
      	if(isset($_SESSION["shopping_cart"])){ 
		      $item_array_name = array_column($_SESSION["shopping_cart"], "item_name");
		      if(!in_array($_GET["name"], $item_array_name)){

		          $count = count($_SESSION["shopping_cart"]);
			      $item_array = array(
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'  	=>	$quantity
			 );
			 $_SESSION["shopping_cart"][$count] = $item_array;
		   } else {
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			//'item_id'			=>	$_GET["id"], Commented avoiding SQL Injection vulns
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'	    =>	$quantity
		);
		$_SESSION["shopping_cart"][0] = $item_array;
    echo '<script>alert("Item Added Successfully")</script>';
	}

    }

}
