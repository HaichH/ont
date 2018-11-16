<?php
include('model/database_handler.php');
include('model/product_model.php');
session_start();
require_once 'file_util.php';  // the get_file_list function
require_once 'image_util.php'; // the process_image function

$image_dir = 'images';
$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;
$action =  filter_input(INPUT_POST,'action');
if(!isset($action)){
	$action = filter_input(INPUT_GET,'action');
	if(!isset($action)){
		$action = 'home_page';
	}
}

switch ($action){
    case 'load_business':
       
        $business = get_business();
        
        include('Admin/company_info.php');
        break;
    case 'update_business':
        $name = filter_input(INPUT_POST,'company_name');
      
        $aboutUs  = filter_input(INPUT_POST,'company_about');
        $email  = filter_input(INPUT_POST,'company_email');
        $phone  = filter_input(INPUT_POST,'company_phone');
        $facebook  = filter_input(INPUT_POST,'company_face');
        $addressLine1  = filter_input(INPUT_POST,'company_add1');
        $addressLine2  = filter_input(INPUT_POST,'company_add2');
        $city  = filter_input(INPUT_POST,'company_city');
        $province  = filter_input(INPUT_POST,'company_province');
        $Instagram  = filter_input(INPUT_POST,'company_insta');
        $twitter  = filter_input(INPUT_POST,'company_twitter');
        $Username  = filter_input(INPUT_POST,'username');
        $Password  = filter_input(INPUT_POST,'password');
         $target    = filter_input(INPUT_POST,'old_path');
        if(!file_exists($_FILES['company_logo']['tmp_name']) || !is_uploaded_file($_FILES['company_logo']['tmp_name'])) 
        {
            $directory = filter_input(INPUT_POST, 'old_path');
        }   
        else{
        $img_name = date("H-i-s").$_FILES['company_logo']['name'];
        $directory = "images/icons/".$img_name;
        move_uploaded_file($_FILES['company_logo']['tmp_name'],$directory);
        $directory_old = filter_input(INPUT_POST, 'old_path');
        unlink($directory_old);
        }
        update_business($name,$directory,$aboutUs,$email,$phone,$facebook,
                 $addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password);
          header("Location: controller_index.php?action=load_business");
          break;
        
    case 'add_section_one':
       // $imagePath  = filter_input(INPUT_POST,'old_path');
        $firstText  = filter_input(INPUT_POST,'prim_text');
        $secondText  = filter_input(INPUT_POST,'sec_text');
         $section = filter_input(INPUT_POST,'section');
        if (isset($_FILES['slide_pic'])) {
            $filename = $_FILES['slide_pic']['name'];
            if (!empty($filename)) {
                $source = $_FILES['slide_pic']['tmp_name'];
                $target = $image_dir_path . DIRECTORY_SEPARATOR .   $filename;
                
                move_uploaded_file($source, $target);
                // create the '400' and '100' versions of the image
               // process_image($image_dir_path, $name."logo.png");
            }
        } 
         if($section=='one'){
            add_section_one( $filename,$firstText,$secondText,true);
                header("Location: controller_index.php?action=load_section_one");
        } else {
            $secondText  = filter_input(INPUT_POST,'categpry');
            add_section_two($firstText,$secondText, $filename,true); 
                header("Location: controller_index.php?action=load_section_one&section=two");
        }

       break;
   case 'update_section_one':
       $sectionID = filter_input(INPUT_POST,'Sec_id');;
        $imagePath = filter_input(INPUT_POST,'old_pic');
        $firstText  = filter_input(INPUT_POST,'prim_text');
        $secondText  = filter_input(INPUT_POST,'sec_text');
       $active  = filter_input(INPUT_POST,'status');
        $section = filter_input(INPUT_POST,'section');
        if (isset($_FILES['slide_pic'])) {
            $filename = $_FILES['slide_pic']['name'];
            if (!empty($filename)) {
                $source = $_FILES['slide_pic']['tmp_name'];
                $target = $image_dir_path . DIRECTORY_SEPARATOR .   $filename;
                $imagePath =   $filename ;
//                  if (file_exists($target)) {
//                       unlink($target);            
//                  }
                move_uploaded_file($source, $target);
                // create the '400' and '100' versions of the image
               // process_image($image_dir_path, $name."logo.png");
            }
        } 
        if($section=='one'){
        update_section_one($sectionID,$imagePath,$firstText,$secondText,true);
         header("Location: controller_index.php?action=load_section_one&section=one");
        } else {
            update_section_two($sectionID, $firstText, $secondText, $imagePath, true);
             header("Location: controller_index.php?action=load_section_one&section=two");
        }
       break;       
   case 'delete_section_one':
           $sectionID = filter_input(INPUT_GET,'sectionone_id');
        $section = filter_input(INPUT_GET,'section');
            if($section=='one'){
                delete_section_one($sectionID);
                 header("Location: controller_index.php?action=load_section_one&section=one");
            } else {
                 delete_section_two($sectionID);
                  header("Location: controller_index.php?action=load_section_one&section=two");
            }
            
            break;
    case 'load_section_one':
        $sectionone = get_all_section_one();
         $sectiontwo = get_all_section_two();
         $categories = get_all_category();
         $not_showing = get_all_not_showing_products();
         $showing = get_top_showing_products();
        include 'Admin/homepage_edditor.php';
        break;
    case 'add_section_three':
        $ProductID = filter_input(INPUT_POST,'show_product');
        show_product(true,$ProductID);
        header("Location: controller_index.php?action=load_section_one&section=three");
        break;
    
    case'login_page':
        include 'Admin/login.html';
    break;

    case 'login':
        $Username = filter_input(INPUT_POST, 'user');
        $Password = filter_input(INPUT_POST, 'pass');
        $credentials = login_admin($Username, $Password);
        if($credentials ==NULL){
            $failure = true;
            include 'Admin/login.html';
        }else{
            header("Location: controller_index.php?action=load_business");
          // include 'Admin/index.html';
        }
		
        break;
        
    case'product_add':
        $categories = get_all_category();
        $sizes = get_sizes();
        $colors = get_all_colours();
        
        //Need to stringfy size and colours to be dynamic
        $size_string = "";
        foreach($sizes as $size){
            $size_string .= " <option value='".$size['sizeID']."'>".$size['sizeDesc']."</option> ";      
        }
        
        $colors_string = "";
        foreach($colors as $color){
            $colors_string .= " <option value='".$color['colorID']."'>".$color['colorName']."</option> ";      
        }
        include 'Admin/product_adder.html';
        break;
    case 'add_product':
        $prod_name = filter_input(INPUT_POST, 'prod_name');
        $prod_price = filter_input(INPUT_POST, 'prod_price');
        $prod_desc = filter_input(INPUT_POST, 'prod_desc');
        $prod_qty = filter_input(INPUT_POST, 'prod_qty');
        $prod_cat = filter_input(INPUT_POST, 'category');
        $prod_weight = filter_input(INPUT_POST, 'prod_weight');
        $prod_dim = filter_input(INPUT_POST, 'prod_dimension');
        $prod_material = filter_input(INPUT_POST, 'prod_material');
        $prod_sizes = $_POST['sizes'];
        $prod_colours = $_POST['colours'];
        $prod_qtys = $_POST['qtys'];
        //Don't forget image
        $img_name = date("H-i-s").$_FILES['prod_pic']['name'];
        $directory = "images/".$img_name;
        move_uploaded_file($_FILES['prod_pic']['tmp_name'],$directory); 
       $is_added =  add_product($directory, $prod_price, $prod_qty, $prod_desc, $prod_name, $prod_weight, $prod_dim, $prod_material);
       foreach ($prod_qtys as $key => $value) {
           
           add_qt_size_color($prod_colours[$key], $prod_sizes[$key], $value, $directory);
       }
       header("Location: controller_index.php?action=product_add");
        break;
        
        case'product_edit':
            $prods = get_products();
             $categories = get_all_category();
            include 'Admin/product_viewer.html';
            break;
        case 'find_product':
            $ProductID = filter_input(INPUT_POST, 'prod_id');
            $product = get_all_products($ProductID);
             $categories = get_all_category();
             $prods = get_products();
             $SiQtCo = get_qty_col_size($ProductID);
             include 'Admin/product_viewer.html';
            break;
    case 'edit_product':
        $prod_id = filter_input(INPUT_POST, 'prod_id');
        $prod_name = filter_input(INPUT_POST, 'prod_name');
        $prod_price = filter_input(INPUT_POST, 'prod_price');
        $prod_desc = filter_input(INPUT_POST, 'prod_desc');
        $prod_qty = filter_input(INPUT_POST, 'prod_qty');
        $prod_cat = filter_input(INPUT_POST, 'category');
        $prod_weight = filter_input(INPUT_POST, 'prod_weight');
        $prod_dim = filter_input(INPUT_POST, 'prod_dimension');
        $prod_material = filter_input(INPUT_POST, 'prod_material');
        if(isset( $_POST['sizes']) && isset($_POST['colours']) && isset($_POST['qtys'])){
        $prod_sizes = $_POST['sizes'];
        $prod_colours = $_POST['colours'];
        $prod_qtys = $_POST['qtys'];
        }
        if(!file_exists($_FILES['prod_pic']['tmp_name']) || !is_uploaded_file($_FILES['prod_pic']['tmp_name'])) 
        {
            $directory = filter_input(INPUT_POST, 'prod_pic_path');
        }   
        else{
        $img_name = date("H-i-s").$_FILES['prod_pic']['name'];
        $directory = "images/".$img_name;
        move_uploaded_file($_FILES['prod_pic']['tmp_name'],$directory);
        $directory_old = filter_input(INPUT_POST, 'prod_pic_path');
        unlink($directory_old);
        }
        $is_eddited = update_product($prod_id, $directory, $prod_price, $prod_qty, $prod_desc, $prod_name, $prod_weight, $prod_dim, $prod_material, $prod_cat);
        if(isset($prod_qtys)){
        foreach ($prod_qtys as $key => $value) {
           
           update_qty($prod_colours[$key], $prod_sizes[$key], $value, $prod_id);
        }}
            $product = get_all_products($prod_id);
             $categories = get_all_category();
             $prods = get_products();
             $SiQtCo = get_qty_col_size($prod_id);
             include 'Admin/product_viewer.html';
        break;
    
    case'manage_products':
        $categories = get_all_category();
        $colors = get_all_colours();
        $sizes = get_sizes();
        include 'Admin/product_manager.html';
        break;
		
		  case 'flag_product':
        $prod_id = filter_input(INPUT_GET, 'id');
        flag_product($prod_id);
        header("Location: controller_index.php?action=product_edit");
        break;
		
    case 'flag_category':
        $ID = filter_input(INPUT_GET, 'ID');
        $res = flag_category($ID);
        header("Location: controller_index.php?action=manage_products");
        break;
    case 'flag_color':
        $ID = filter_input(INPUT_GET, 'ID');
        $res = flag_color($ID);
         header("Location: controller_index.php?action=manage_products");
        break;
    case 'flag_size':
        $ID = filter_input(INPUT_GET, 'ID');
        $res = flag_size($ID);
         header("Location: controller_index.php?action=manage_products");
        break;
    case'add_categ':
         $name = filter_input(INPUT_POST, 'prod_category');
        $res = add_category($name);
         header("Location: controller_index.php?action=manage_products");
        break;
    case'add_size':
        $desc = filter_input(INPUT_POST, 'prod_size');
        $res  = add_size($desc);
         header("Location: controller_index.php?action=manage_products");
        break;
    case'add_color':
        $color = filter_input(INPUT_POST, 'prod_color');
        $res = add_color($color);
         header("Location: controller_index.php?action=manage_products");
    case 'remove_product':
        $ProductID = filter_input(INPUT_GET,'product_id',FILTER_VALIDATE_INT);
        show_product(0,$ProductID);
        header("Location: controller_index.php?action=load_section_one&section=three");
        break;
    case 'update_product_pic':
        $ProductID = filter_input(INPUT_POST,'product_id');
         $imagePath = filter_input(INPUT_POST,'old_pic');
         if (isset($_FILES['slide_pic'])) {
            $filename = $_FILES['slide_pic']['name'];
            if (!empty($filename)) {
                $source = $_FILES['slide_pic']['tmp_name'];
                $target = $image_dir_path . DIRECTORY_SEPARATOR .   $filename;
                $imagePath =   $filename ;
//                  if (file_exists($target)) {
//                       unlink($target);            
//                  }
                move_uploaded_file($source, $target);
                // create the '400' and '100' versions of the image
               // process_image($image_dir_path, $name."logo.png");
            }
        } 
        update_product_pic( $imagePath , $ProductID);
        header("Location: controller_index.php?action=load_section_one&section=three");
        break;
    case 'home_page':
        $sectionone = get_all_section_one();
        $showing = get_top_showing_products();
        $sectiontwo = get_all_section_two();
         $business = get_business();
        include 'home-03.html';
        break;
    case 'product':
       //Modify products to implement pagination
        //Count the amount of products 
        $num_products = get_num_products();
        
        //Calculate the next lot to display buy fetching the current page viewing
        $page_num = filter_input(INPUT_GET, 'page');
        $per_page = 10;
        if(!isset($page_num)){
            $page_num = 1;
        }
        
        if($page_num!= 1){
            $start = ($page_num - 1) * $per_page;
        }else{
            $start = 0;
        }
        $products = get_products_paginate($start);
        
        $num_pages = ceil($num_products['totalRecords']/$per_page);
        //This might get a little dirty 
       
        $pagination = "";
        
        for($i = 0; $i < $num_pages;$i++){
            $pagination .="<a href='?action=product&page=".($i+1)."' class='flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1'> ";
            $pagination.= ($i+1);
            $pagination .= "</a>";
        }
        
        $business = get_business();
        
      //  print_r($products);
        include 'product.html';
        break;
    
    case 'about':
         $business = get_business();
         include 'about.html';
        break;
    
    case'contact':
        $business = get_business();
        include 'contact.html';
    break;

case'prod_details':
    $business = get_business();
    $prod_id = filter_input(INPUT_GET, 'ID');
    $product = get_product_by_id($prod_id);
    $prod_colors = get_product_colors($prod_id);
    $sizes = get_product_sizes($prod_id);
   // $product = get_product_by_id(3);
    //die(print_r($product));
    include 'product-detail.php';
    break;
case 'add_cart':
    $prod_id = filter_input(INPUT_POST, 'prod_id');
    $size =filter_input(INPUT_POST, 'sizes');
    $color =filter_input(INPUT_POST, 'colors');
    $qty =filter_input(INPUT_POST, 'buy_qty');
    $business = get_business();
    $product = get_product_by_id($prod_id);
    $prod_colors = get_product_colors($prod_id);
    $sizes = get_product_sizes($prod_id);
    
    if(isset($color)==NULL){
        $color = "None";
    }
    if(!isset($size)==NULL){
        $size = "None";
    }
    //match color codes with names and sizes with sizes
    foreach ($prod_colors as $value) {
        if(trim($value['colorID'])== trim($color)){
             $color = trim($value['colorName']);
        }else{
             $color = "Default colour";
        }
    }
    
    foreach ($sizes as $value) {
        if(trim($value['sizeCode'])== trim($size)){
            $size = trim($value['sizeDesc']);
        }else{
            $size = "Default size";
        }
    }
    //Create an array of the product
    $product_array = array($product["productID"]=>array('title'=>$product["productTitle"], 'price'=>$product["productPrice"],
        'image'=>$product["productImagePath"], 'quantity'=> $qty, 'size'=>$size, 'color'=> $color));
    
    //Then add the array to the session variables
    //check if session variables are empty first
    if(empty($_SESSION['cart_product'])){
        //Create the cart item for the first time
        $_SESSION["cart_product"] = $product_array;
    }else{
        //Check if the product already exists, to change sizes/colors/qty
        if(in_array($product["productID"], array_keys($_SESSION['cart_product']))){
            //If it does exist, loop through session items to find product and update it. 
            foreach ($_SESSION['cart_product'] as $a => $value) {
                if($product["productID"] == $a){
                    $_SESSION['cart_product'][$a]['color'] =  $color ;
                    $_SESSION['cart_product'][$a]['size'] = $size;
                    $_SESSION['cart_product'][$a]['quantity'] = $qty;
                }
            }
        }
        else{
            //Just add to the products
            $_SESSION["cart_product"] = array_merge($_SESSION["cart_product"],$product_array);
        }
    }
  // die(print_r($_SESSION));
   
    $added = TRUE;
    include 'product-detail.php';
    break;

    case 'view_cart':
        //Just include page and it'll do the rest
        $business = get_business();
        include 'shoping-cart.php';
        break;
    
    case 'pay':
        $phone_num = filter_input(INPUT_POST, 'phone_num');
        $house_num = filter_input(INPUT_POST, 'house_num');
        $street_name = filter_input(INPUT_POST, 'street_name');
        $suburb = filter_input(INPUT_POST, 'suburb');
        $city = filter_input(INPUT_POST, 'city');
        //Loop through sessions and generate the products plus total pay
        $cart_total =0;
        $prods = "Clothes: +";
        foreach ($_SESSION['cart_product'] as $value){ 
            $line_total = $value['price']* $value['quantity'];
            $cart_total += $line_total;
            if ($value === end($array)) {
        $prods.=$value['title']." Qty:".$value['quantity'];
        }else{
            $prods.=$value['title']." Qty:".$value['quantity']." \n +";
        }
        }
        if($cart_total < 1000){  
        $cart_total = $cart_total +100;}
        else{
            $cart_total=  $cart_total;
        }
        $token = date("Y/m/d h:i:s v"); 
        $token_products =  $prods;
        //create token
        
        $ads= add_transaction($token, $token_products);
        
        $pay_link = "https://www.payfast.co.za/eng/process?cmd=_paynow&receiver=13121591&item_name=";
        $pay_link.= "Uncommon Products&amount=";
        $pay_link.= "$cart_total&return_url=";
        $pay_link.= "https://www.uncommonwear.co.za/controller_index.php?action=jvsvBitch&token=$token&phone_num=$phone_num&house_num=$house_num";
        $pay_link .= "&street_name=$street_name&suburb=$suburb&city=$city&amp;cancel_url=";
        $pay_link.="https://www.uncommonwear.co.za/controller_index.php?action=cancel&token=$token";
        header("LOCATION: $pay_link");
     // header("LOCATION: controller_index.php?action=cancel&token=$token");
     // header("LOCATION: controller_index.php?action=jvsvBitch&token=$token&phone_num=$phone_num&house_num=$house_num&street_name=$street_name&suburb=$suburb&city=$city");
       
      break;
    
    case'jvsvBitch':
        $token = filter_input(INPUT_GET, 'token');
        //get token products
        $token_products = get_token_products($token);
        $prods = $token_products['products'];
        $phone_num = filter_input(INPUT_GET, 'phone_num');
        $house_num = filter_input(INPUT_GET, 'house_num');
        $street_name = filter_input(INPUT_GET, 'street_name');
        $suburb = filter_input(INPUT_GET, 'suburb');
        $city = filter_input(INPUT_GET, 'city');
        //Send email!!! 
        
        $email_to_send = "Another delivery for today \nPhone Number: $phone_num\n Address:\n";
        $email_to_send.= "$house_num $street_name, $suburb, $city the products are as follows\n$prods";
        $to = "admin@uncommonwear.co.za";
        $subject = "Customer Delivery";
        $txt = $email_to_send;
        //die(print_r($txt));
        $headers = "From: webmaster@uncommon.co.za" . "\r\n" .
        "CC: onthatile@uncommonwear.co.za";
        mail($to,$subject,$txt,$headers);
        session_destroy();
        session_start();
        header("LOCATION: controller_index.php?action=confirm");
        break;

    case 'confirm':
        $business = get_business();
         include 'confirmation.php';
        break;
    
    case 'cancel':
        $token = filter_input(INPUT_GET, 'token');
        remove_transaction($token);
        //die(print_r($token));
        header("LOCATION: controller_index.php");
        break;
}






