<?php
include('model/database_handler.php');
include('model/product_model.php');

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
            include 'Admin/index.html';
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
    case 'products':
        $products = get_products();
        break;
}






