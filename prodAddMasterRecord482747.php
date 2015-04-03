<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product Add Utility</title>
</head>
<body>

﻿<?php
    echo '<p>Prepare to add a record</p><br>';

	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
 
    $sql = "INSERT into mj_productMaster " .
	        "(`title`, `description`, `category`, `subCategory`, `quantity`, `basePrice`, `shipSurcharge`, `frameSurcharge`, `shipAndFrame`, `thumbnail`, `image`, `dimensionsPainted`, `dimensionsFramed`) " .
	        "VALUES ($_POST['titleInput'],$_POST['descriptionInput'],$_POST['category'],$_POST['subcat'],$_POST['quantityInput']," .
	        "$_POST['basePriceInput'],$_POST['shipChargeInput'],$_POST['frameChargeInput'],$_POST['shipFrameChargeInput']," .
	        "$_POST['thumbnailInput'],$_POST['imageInput'],$_POST['dimPaintedInput'],$_POST['dimFramedInput']";

    if ($result = mysql_query($sql, $cxn)) {
       echo 'entry added!';
       } else {
       echo 'ERROR--nothing was added!';
       };

?>               
  
</body>
</html>