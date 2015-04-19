<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product Add Utility</title>
</head>
<body>
   <h1>Adding your record....</h1>
   
﻿<?php
    //Writes the photos to the server folder
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    $thumbTarget = "/home3/marymjan/public_html/Images/" . $_POST['thumbnailInput'];
    $fullTarget = "/home3/marymjan/public_html/Images/" . $_POST['imageInput'];
    if(move_uploaded_file($_FILES['thumbFile']['tmp_name'], $thumbTarget)) {
       echo "thumbfile uploaded... ";
       } else {echo " Sorry, there was a problem uploading " . $thumbTarget . " from " . $_FILES['thumbFile']['tmp_name'];}
    if(move_uploaded_file($_FILES['fullFile']['tmp_name'], $fullTarget)) {
       echo "fullfile uploaded... ";
    } else {echo " Sorry, there was a problem uploading " . $fullTarget;}    
    //Adds the record to Product Master
	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);

        $category=$_POST['category'];
        $subcat=$_POST['subCategory'];

        if ($subcat <= ' ') {
                $sql = "SELECT * FROM mj_typeMaster WHERE category = '" . $category . "' AND subCategory IS NULL;";
        } else {
                $sql = "SELECT * FROM mj_typeMaster WHERE category = '" . $category . "' AND subCategory = '" . $subcat . "';";
        };
        
        $result = mysql_query($sql, $cxn);
     
        $counter = 0;
        while ($row = mysql_fetch_array($result)) {$counter++;}
        if ($counter > 0) {
           
    	   $sql = "INSERT into mj_productMaster " .
	        "(dispOrder, title, description, category, subCategory, quantity, basePrice, shipSurcharge, frameSurcharge, shipAndFrame," .
	          " thumbnail, image, widthPercent, dimensionsPainted, dimensionsFramed) ";
	          
 	   $sql .= "VALUES ('" . $_POST['dispOrderInput'] . "', '" . $_POST['titleInput'] . "', '" . $_POST['descriptionInput'] . "', '" . $category . "', '" . $subcat . "', '" .
 	         $_POST['quantityInput'] . "', '" . $_POST['basePriceInput'] . "', '" . $_POST['shipChargeInput'] . "', '" . $_POST['frameChargeInput'] . "', '" . 
 	         $_POST['shipFrameChargeInput'] . "', '" . $_POST['thumbnailInput'] . "', '" . $_POST['imageInput'] . "', '" . 
 	         $_POST['widthInput'] . "', '" . $_POST['dimPaintedInput'] . "', '" . $_POST['dimFramedInput'] . "');";

           if (mysql_query($sql)) {
               echo "New record created successfully";
               } else {
               echo "Error: Show Scott this........<br>" . $sql . "<br>";
               }
      
         } else {
              echo 'Bad combination of category and subcategory';
              };

         mysql_close($cxn);
?>               
  
</body>
</html>