<?php
@include "Product.php";

/**
 * Set headers
 */
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

/**
 * Create new products
 */
$prod1 = new Product(1, "Kilchurn Castle", "Aquarelle paitning of Kilchurn Castle in Scotland, 23x30.5 cm", "https://cdna.artstation.com/p/assets/images/images/031/978/916/large/amanda-x-nt0p7fsvyn1rlhfado1-640.jpg?1605126715", "4000 SEK", "landscape");
$prod2 = new Product(2, "Roswell, NM", "Aquarelle painting of a small lake outside of Roswell, New Mexico. 23x30.5 cm", "https://cdnb.artstation.com/p/assets/images/images/031/978/707/large/amanda-x-nw1nwyi1ea1rlhfado1-640.jpg?1605126314", "4000 SEK", "landscape");
$prod3 = new Product(3, "Dante", "Aquarelle painting of Dante, the bullmastiff. 29.7x42 cm", "https://cdnb.artstation.com/p/assets/images/images/031/969/855/large/amanda-x-omn7h2yghd1rlhfado1-640.jpg?1605109297", "8000 SEK", "animal");
//$prodN = new Product(id, "title", "description", "image", "price", "category");

//push in class objects in array
$array=array(
  $prod1->toArray(), 
  $prod2->toArray(), 
  $prod3->toArray()
);

/**
 * Filter and error
 */
$error = array();

//checks category
$arrayCategory = Product::getCategory($array);

//if chosen category doesn't exist, push error message in error array
if(array_key_exists("Error", $arrayCategory)){
  array_push($error, $arrayCategory);
}

//if there's been an error, continue with original array. else, continue with same array
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
