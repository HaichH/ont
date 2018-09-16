<?php

//section one methods
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
function delete_section_one($sectionID){
	$sql = 'CALL uspDeleteSectionOne (?)';
	$paras = array($sectionID);
	return DatabaseHandler::Execute($sql,$paras);
}
//End of section one methods
//Section 2 methods
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
//End of section two methods
//business section 
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
//end of business section
//Category section
function get_all_category() {
    $sql = 'CALL uspGetAllCategory  ';
    return DatabaseHandler::GetAll($sql);
}
//end of category section
//order section
function add_order($CustID,$OrderID,$OrderDate){
	$sql = 'CALL uspAddOrder (?,?,?) ';
	$paras = array($CustID,$OrderID,$OrderDate);
	return DatabaseHandler::Execute($sql,$paras);
}
//end of order section
//order details section
function add_order_line($OrderID,$ProductID,$UnitPrice	,$Qty){
	$sql = 'CALL uspAddOrderLine (?,?,?,?) ';
	$paras = array($OrderID,$ProductID,$UnitPrice	,$Qty);
	return DatabaseHandler::Execute($sql,$paras);
}
//end of oder line section
//product section 
function get_product_by_id($ProductID){
	$sql = 'CALL uspGetProductByID (?) ';
        $paras = array($ProductID);
	return DatabaseHandler::GetRow($sql,$paras);
}
function get_product_by_cat($categoryID){
	$sql = 'CALL uspGetProductsByCategory (?) ';
        $paras = array($categoryID);
	return DatabaseHandler::GetRow($sql,$paras);
}
//end of product section