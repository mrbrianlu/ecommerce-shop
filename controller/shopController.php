<?php

// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

// Create a cart array if needed
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

require('model/database.php');
require('model/product_db.php');
require('model/category_db.php');

// Include cart functions
require('model/cartModel.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

// Add or update cart as needed
switch ($action) {
    case 'list_products':
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        $select = filter_input(INPUT_GET, 'select');
        if ($category_id == NULL || $category_id == FALSE) {
            $category_id = 1;
        }
        if ($select == 'name_asc')
            $sorting = "productName ASC";
        else if ($select == 'price_asc')
            $sorting = "listPrice ASC";
        else
            $sorting = "productID";
        $categories = get_categories();
        $category_name = get_category_name($category_id);
        $products = get_products_by_category($category_id, $sorting);

        /* if (isset($_GET['page'])) {
          $page = $_GET['page'];
          } else {
          $page = 1;
          }
          $results_per_page = 8;
          $number_of_products = count($products_number);
          $number_of_pages = ceil($number_of_products/$results_per_page);
          $offset = ($page-1) * $results_per_page; */

        include('view/shopView.php');
        break;
    case 'view_product':
        $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
        if ($product_id == NULL || $product_id == FALSE) {
            $error = 'Missing or incorrect product id.';
            include('../errors/error.php');
        } else {
            $categories = get_categories();
            $product = get_product($product_id);

            // Get product data
            $code = $product['productCode'];
            $name = $product['productName'];
            $list_price = $product['listPrice'];

            // Get image URL and alternate text
            $image_filename = 'img/product-img/' . $code . '.jpeg';
            $image_alt = 'Image: ' . $code . '.png';

            include('view/productView.php');
        }
        break;
    case 'show_cart':
        include('view/cartView.php');
        break;
    case 'add':
        $product_id = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        $product = get_product($product_id);
        add_item($product_id, $quantity);
        include('view/cartView.php');
        break;
    case 'update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach ($new_qty_list as $key => $qty) {
            if ($_SESSION['cart'][$key]['qty'] != $qty) {
                update_item($key, $qty);
            }
        }
        include('view/cartView.php');
        break;
    case 'empty_cart':
        unset($_SESSION['cart']);
        include('view/cartView.php');
        break;
    case 'checkout':
        include('view/checkoutView.php');
        break;
}
?>