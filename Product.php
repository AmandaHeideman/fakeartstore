<?php

class Product
{
  /**
   * Fields
   */
  private $id;
  private $title;
  private $description;
  private $size;
  private $image;
  private $price;
  private $category;

  /**
   * Constructor
   */
  public function __construct($id, $title, $description, $size, $image, $price, $category)
  {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->size = $size;
    $this->image = $image;
    $this->price = $price;
    $this->category = $category;
  }

  /**
   * Converts object to array
   */
  public function toArray()
  {
    $array = array(
      "id" => $this->id,
      "title" => $this->title,
      "description" => $this->description,
      "size" => $this->size,
      "image" => $this->image,
      "price" => $this->price,
      "category" => $this->category
    );

    return $array;
  }

  /**
   * Checks limit in querystring
   */
  public static function getLimit($array)
  {
    $limit = $_GET['limit'] ?? null;

    if($limit){
      if ($limit > 20 || $limit < 0) { //if limit isn't between 0-20, return error message
        return array("Error" => "Limit must be between 0 and 20");
      }
      else{ //if limit is acceptable, shuffle and return limited array
        shuffle($array);
        $arrayLimit = array_slice($array, 0, $limit);
        return $arrayLimit;
      }
    }
    //if limit isn't set, return original array
    else{
      return $array;
    }
  }

  /**
   * Checks category in querystring
   */
  public static function getCategory($array, $fixedCategories){
    $category = $_GET['category'] ?? null;

    $categoryArray = array();
    if($category){
      foreach($array as $product){
        //pushes i products with chosen category in array
        if($product['category']===$category){
          array_push($categoryArray, $product);
        }
      }
      //if chosen category doesn't exist in $fixedCategories, push error message in array
      if(!in_array($categoryArray, $fixedCategories) && count($categoryArray)===0){
        $categoryArray =  array("Error"=>"Category not found");
      }
    }
    //if category isn't set, set original array as the new array
    else{
      $categoryArray = $array;
    }
    return $categoryArray;
  }
  
}
