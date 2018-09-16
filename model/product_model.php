<?php

function get_all_products($ProductID){
	$sql = 'CALL uspGetProductByID (?) ';
	$paras = array($ProductID);
	return DatabaseHandler::GetRow($sql,$paras);
}
function get_all_section_one(){
	$sql = 'CALL uspGetAllSectionOne  ';
	return DatabaseHandler::GetAll($sql);
}
function update_section_one($sectionID,$imagePath,$firstText,$secondText,$active){
	$sql = 'CALL uspUpdateSectionOne (?,?,?,?,?) ';
	$paras = array($sectionID,$imagePath,$firstText,$secondText,$active);
	return DatabaseHandler::Execute($sql,$paras);
}
function add_section_one($imagePath,$firstText,$secondText,$active){
	$sql = 'CALL uspAddSectionOne (?,?,?,?) ';
	$paras = array($imagePath,$firstText,$secondText,$active);
	return DatabaseHandler::Execute($sql,$paras);
}
function get_section_one_by_id($sectionID){
	$sql = 'CALL uspGetSectionOneByID (?) ';
        $paras = array($sectionID);
	return DatabaseHandler::GetRow($sql,$paras);
}
function get_all_section_two(){
	$sql = 'CALL uspGetSectionTwo  ';
	return DatabaseHandler::GetAll($sql);
}
function update_section_two($sectionID,$firstText,$secondText,$imagePath,$active){
	$sql = 'CALL uspUpdateSectionTwo (?,?,?,?,?) ';
	$paras = array($sectionID,$firstText,$secondText,$imagePath,$active);
	return DatabaseHandler::Execute($sql,$paras);
}
function add_section_two($firstText,$secondText,$imagePath,$active){
	$sql = 'CALL uspAddSectionTwo (?,?,?,?) ';
	$paras = array($firstText,$secondText,$imagePath,$active);
	return DatabaseHandler::Execute($sql,$paras);
}
function get_section_two_by_id($sectionID){
	$sql = 'CALL uspGetSectionTwoByID (?) ';
        $paras = array($sectionID);
	return DatabaseHandler::GetRow($sql,$paras);
}
function delete_section_two($sectionID){
	$sql = 'CALL uspDeleteSectionTwo (?)';
	$paras = array($sectionID);
	return DatabaseHandler::Execute($sql,$paras);
}
function get_business(){
	$sql = 'CALL uspGetBusiness  ';
	return DatabaseHandler::GetRow($sql);
}
function update_business($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password){
	$sql = 'CALL uspUpdateBusiness (?,?,?,?,?,?,?,?,?,?,?,?,?,?)  ';
	$paras = array($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password);
	return DatabaseHandler::Execute($sql,$paras);
}
function add_business($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password){
	$sql = 'CALL uspAddBusiness (?,?,?,?,?,?,?,?,?,?,?,?,?,?) ';
	$paras = array($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password);
	return DatabaseHandler::Execute($sql,$paras);
}	
function delete_section_one($sectionID){
	$sql = 'CALL uspDeleteSectionOne (?)';
	$paras = array($sectionID);
	return DatabaseHandler::Execute($sql,$paras);
}
function get_all_category() {
    $sql = 'CALL uspGetAllCategory  ';
    return DatabaseHandler::GetAll($sql);
}
function login_admin($username, $password) {
    $sql = 'CALL uspLoginAdmin(?,?)';
    $paras = array(
        $username,
        $password
    ); 
    return DatabaseHandler::GetRow($sql, $paras);
}
function get_sizes() {
     $sql = 'CALL uspGetAllSize  ';
    return DatabaseHandler::GetAll($sql);
}

function get_all_colours() {
   $sql = 'CALL uspGetAllColor';
   return DatabaseHandler::GetAll($sql);
}
function add_product($img_path,$price, $qty, $desc,$title, $weight, $dime, $materials ) {
    $sql =" CALL uspAddProduct(?,?,?,?,?,?,?,?)";
    $paras = array(
        $img_path,$price, 
        $qty,
        $desc,
        $title, 
        $weight, 
        $dime, 
        $materials
        
    );
    return DatabaseHandler::Execute($sql,$paras);
}
function add_qt_size_color($color, $size, $qty, $img) {
     $sql =" CALL uspAddProductSCQ(?,?,?,?)";
     $paras = array(
         $color, $size, $qty, $img
     );
     return DatabaseHandler::Execute($sql,$paras);
}

function get_products() {
    $sql =" CALL uspGetAllProducts";
    return DatabaseHandler::GetAll($sql);
}
function update_product($productID, $img_path,$price, $qty, $desc,$title, $weight, $dime, $materials) {
    $sql =" CALL uspUpdateProduct(?,?,?,?,?,?,?,?,?)";
    $paras = array(
        $productID,
        $img_path,$price, 
        $qty,
        $desc,
        $title, 
        $weight, 
        $dime, 
        $materials,
               
    );
    return DatabaseHandler::Execute($sql,$paras);
}
function update_qty($prod_id, $color, $size, $qty) {
    $sql =" CALL uspUpdateSCQ(?,?,?,?)";
     $paras = array(
         $prod_id, $color, $size, $qty
     );
     return DatabaseHandler::Execute($sql,$paras);
}

function get_qty_col_size($prod_id) {
     $sql = 'CALL uspGetSCQ(?)';
    $paras = array(
        $prod_id
    ); 
    return DatabaseHandler::GetAll($sql, $paras);
}

function flag_category($ID) {
    $sql = 'CALL uspFlagCategory(?)';
    $paras = array(
        $ID
    ); 
    return DatabaseHandler::Execute($sql,$paras);
}

function flag_size($ID) {
    $sql = 'CALL uspFlagSize(?)';
    $paras = array(
        $ID
    );
    return DatabaseHandler::Execute($sql,$paras);
}

function flag_color($ID) {
    $sql = 'CALL uspFlagColor(?)';
    $paras = array(
      $ID
    ); 
    return DatabaseHandler::Execute($sql,$paras);
}

function add_category($name){
	$sql = 'CALL uspAddCategory (?, ?)';
	$paras = array($name, $name);
	return DatabaseHandler::Execute($sql,$paras);
}

function add_size($desc){
	$sql = 'CALL uspAddSize (?,?)';
	$paras = array($desc, $desc);
	return DatabaseHandler::Execute($sql,$paras);
}

function add_color($color){
	$sql = 'CALL uspAddColor (?,?)';
	$paras = array($color, $color);
	return DatabaseHandler::Execute($sql,$paras);
}


