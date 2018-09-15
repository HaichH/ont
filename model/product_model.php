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
	$sql = 'CALL uspGetProductByID (?,?,?,?,?) ';
	$paras = array($sectionID,$imagePath,$firstText,$secondText,$active);
	return DatabaseHandler::Execute($sql,$paras);
}
function add_section_one($imagePath,$firstText,$secondText,$active){
	$sql = 'CALL uspAddSectionOne (?,?,?,?,?) ';
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
	$sql = 'CALL uspAddSectionTwo (?,?,?,?,?) ';
	$paras = array($firstText,$secondText,$imagePath,$active);
	return DatabaseHandler::Execute($sql,$paras);
}
function get_section_two_by_id($sectionID){
	$sql = 'CALL uspGetSectionTwoByID (?) ';
        $paras = array($sectionID);
	return DatabaseHandler::GetRow($sql,$paras);
}
function get_business(){
	$sql = 'CALL uspGetBusiness  ';
	return DatabaseHandler::GetRow($sql);
}
function update_business($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password){
	$sql = 'CALL uspUpdateSectionTwo (?,?,?,?,?,?,?,?,?,?,?,?,?,?)  ';
	$paras = array($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password);
	return DatabaseHandler::Execute($sql,$paras);
}
function add_business($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password){
	$sql = 'CALL uspAddBusiness (?,?,?,?,?,?,?,?,?,?,?,?,?,?) ';
	$paras = array($name,$logoPath,$aboutUs,$email,$phone,$facebook,$addressLine1,$addressLine2,$city,$province,$Instagram,$twitter,$Username,$Password);
	return DatabaseHandler::Execute($sql,$paras);
}