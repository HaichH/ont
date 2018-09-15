<?php
include('../model/database_handler.php');
include('../model/product_model.php');

$sectionone = get_all_section_one();
foreach($sectionone as $secone){
    echo $secone["SectionID"];
    echo '<br/>'. $secone["FirstText"];
}
$sectiontwo = get_all_section_two();
foreach($sectiontwo as $sectwo){
    echo '<br/>'. $sectwo["SectionID"];
    echo '<br/>'. $sectwo["FirstText"];
 
}
$business = get_business();
echo '<br/>'. $business["Name"];
echo '<br/>'. $business["LogoPath"];

include('../model/product_model.php');