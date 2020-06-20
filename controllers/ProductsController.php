<?php
require_once 'models/Products.php';
require_once 'models/ShowCategoryModel.php';

$selectedCategory = false;
$categorys = getCategorys();

if(isset($_GET['category_id'])){
    if(!ctype_digit($_GET['category_id'])) {
        header('Location:index.php');
        exit;
    }
    foreach($categorys as $category){
        if($category['id'] == $_GET['category_id'] ){
            $selectedCategory = $category;
        }
    }
    if($selectedCategory == false){
        header('Location:index.php');
        exit;
    }
    $products = getProductsByCategoryId($_GET['category_id']);
}
else{
    $products = getAllProducts();
}
require('views/Allproducts.php');
