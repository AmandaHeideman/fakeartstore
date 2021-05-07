<?php
include "Product.php";
include_once "productData.php";

/**
 * Set headers
 */
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");


/**
 * Filter by category and limit, handle errors
 */
$error = array();

//checks category
$arrayCategory = Product::getCategory($array, $fixedCategories);

//if chosen category doesn't exist, push error message in error array
if(array_key_exists("Error", $arrayCategory)){
  array_push($error, $arrayCategory);
}

//if there's been an error, continue with original array. else, continue with category array
if(count($error)>0){
  $arrayLimit = Product::getLimit($array);
}else{
  $arrayLimit = Product::getLimit($arrayCategory);
}

//if chosen limit is too much, push error message in error array
if(array_key_exists("Error", $arrayLimit)){
  array_push($error, $arrayLimit);
}


/**
 * Convert to JSON
 */

//if there's been an error, show the error array
if($error){
  $json = json_encode($error, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
else{
  $json = json_encode($arrayLimit, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

//send to client
echo $json; 
