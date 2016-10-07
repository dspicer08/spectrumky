<?php
require_once 'PrintfulClient.php';


/*
 *	Replace this with your API key
 */
define('API_KEY', 'YOUR_API_KEY');


$pf = new PrintfulClient(API_KEY);

try{
	/**
	 * 	Uncomment any of the following examples to test it
	 */

	//Get information about the store
	/*
	 	$store = $pf->get('store');
		var_export($store);
	*/

	//Get product list
	/*
	 	$products = $pf->get('products');
		var_export($products);
	*/

	//Get variants for product 10
	/*
	 	$variants = $pf->get('products/10');
		var_export($variants);
	*/

	//Get information about Variant 1007
	/*
			 $data = $pf->get('products/variant/1007');
			var_export($data);
	*/

	//Select 10 latest orders
	/*
		 $orders = $pf->get('orders',array('limit'=>10));
		var_export($orders);
		$items = $pf->getItemCount(); //Get total number of items available from the previous request
		echo "Total orders ". $items;
	*/

	//Select order with ID 12345 (Replace with your order's ID)
	/*
		$order = $pf->get('orders/12345');
		var_export($order);
	 */

	//Select order with External ID 9900999 (Replace with your order's External ID)
	/*
		$order = $pf->get('orders/@9900999');
		var_export($order);
	 */

	//Confirm order with ID 12345 (Replace with your order's ID)
	/*
		$order = $pf->post('orders/12345/confirm');
		var_export($order);
	*/

	//Cancel order with ID 12345 (Replace with your order's ID)
	/*
		$order = $pf->delete('orders/12345');
		var_export($order);
	*/

	//Create an order
	/*	$order = $pf->post('orders',array(
			'recipient' => array(
				'name' => 'John Doe',
				'address1' => '172 W Providencia Ave #105',
				'city' => 'Burbank',
				'state_code' => 'CA',
				'country_code' => 'US',
				'zip' => '91502'
			),
			'items' => array(
				array(
					'variant_id' => 1,//Small poster
					'name' => 'Niagara Falls poster', //Display name
					'retail_price' => '19.99', //Retail price for packing slip
					'quantity' => 1,
					'files' => array(
						array(
							'url' => 'http://example.com/files/posters/poster_1.jpg'
						)
					)
				),
				array(
					'variant_id' => 1118,
					'quantity' => 2,
					'name' => 'Grand Canyon T-Shirt', //Display name
					'retail_price' => '29.99', //Retail price for packing slip
					'files' => array(
						array(//Front print
							'url' => 'http://example.com/files/tshirts/shirt_front.ai'
						),
						array(//Back print
							'type' => 'back',
							'url' => 'http://example.com/files/tshirts/shirt_back.ai'
						),
						array(//Mockup image
							'type' => 'preview',
							'url' => 'http://example.com/files/tshirts/shirt_mockup.jpg'
						)
					),
					'options' => array(//Additional options
						array(
							'id' => 'remove_labels',
							'value' => true
						)
					)
        		)
			)
		));
		var_export($order);
	*/

	//Create an order and confirm immediately
	/*	$order = $pf->post('orders',
			array(
				'recipient' => array(
					'name' => 'John Doe',
					'address1' => '172 W Providencia Ave #105',
					'city' => 'Burbank',
					'state_code' => 'CA',
					'country_code' => 'US',
					'zip' => '91502'
				),
				'items' => array(
					array(
						'variant_id' => 1,//Small poster
						'name' => 'Niagara Falls poster', //Display name
						'retail_price' => '19.99', //Retail price for packing slip
						'quantity' => 1,
						'files' => array(
							array(
								'url' => 'http://example.com/files/posters/poster_1.jpg'
							)
						)
					)
				)
			),
			array('confirm'=>1)
		);
		var_export($order);
	*/

	//Calculate shipping rates for an order
	/*
		$rates = $pf->post('shipping/rates',array(
			'recipient' => array(
				'country_code'=>'US',
				'state_code' => 'CA'
			),
			'items'=> array(
				array('variant_id'=>1,'quantity'=>1), //Small poster
				array('variant_id'=>1118,'quantity'=>2) //Alternative T-Shirt
			)
		));
		var_export($rates);
	*/
}
catch(PrintfulApiException $e){ //API response status code was not successful
	echo 'Printful API Exception: '.$e->getCode().' '.$e->getMessage();
}
catch(PrintfulException $e){ //API call failed
	echo 'Printful Exception: '.$e->getMessage();
	var_export($pf->getLastResponseRaw());
}
