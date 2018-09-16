<?php
include('/model/database_handler.php');
include('/model/product_model.php');

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
        
        include('/Admin/company_info.php');
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
        if (isset($_FILES['company_logo'])) {
                $filename = $_FILES['company_logo']['name'];
                if (!empty($filename)) {
                    
                
                        $source = $_FILES['company_logo']['tmp_name'];
                         $i = strrpos($filename, '.');
                        $image_name = substr($filename, 0, $i);
                        $ext = substr($filename, $i);
                        $target = $image_dir_path . DIRECTORY_SEPARATOR ."icons" . DIRECTORY_SEPARATOR . "company_logo". $ext ;
                           if (file_exists($target)) {
                                        unlink($target);
//                                       $target1 = $image_dir_path . DIRECTORY_SEPARATOR ."icons" . DIRECTORY_SEPARATOR . "company_logo_100". $ext ;
//                                        if(file_exists($target1)){
//                                               unlink( $$target1);
//                                        }
//                                       $target4 = $image_dir_path . DIRECTORY_SEPARATOR ."icons" . DIRECTORY_SEPARATOR . "company_logo_400.png". $ext ;
//                                        if(file_exists($target4)){
//                                               unlink( $$target4);
//                                        }
                                }
                        move_uploaded_file($source, $target);
                        // create the '400' and '100' versions of the image
                        //process_image($image_dir_path. DIRECTORY_SEPARATOR ."icons" , "company_logo". $ext  );
                        $target = "company_logo". $ext;
                }
                
        } 
        update_business($name,$target,$aboutUs,$email,$phone,$facebook,
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
        include '/Admin/homepage_edditor.php';
        break;
    case 'add_section_three':
        $ProductID = filter_input(INPUT_POST,'show_product');
        show_product(true,$ProductID);
        header("Location: controller_index.php?action=load_section_one&section=three");
        break;
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
        include 'model/home.php';
        break;
		
	
}








