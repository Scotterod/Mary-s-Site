<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/dispOneItem.js"></script>  
    <title>Mary Jansen: Products</title>
</head>
<body>
    <header>
    </header>
    <h1></h1><br />
    <section>
   
<?php
	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);

	$prodId = $_GET['id'];
                      
	$sql = "SELECT * FROM mj_productMaster " .
	       "WHERE ID = '" . $prodId . "';";

	$products = mysql_query($sql, $cxn);

	$row = mysql_fetch_array($products);
	$prodId = $row['ID'];
	$category = $row['category'];
	$subCategory = $row['subCategory'];
	$title = $row['title'];
	$description = $row['description'];
	$basePrice = $row['basePrice'] / 100.00;
	$quantity = $row['quantity'];
        if ($quantity > 0) {$priceDisp = 'Base Price is $' . $basePrice;}
        else {$priceDisp = 'SOLD';}		
	$imageLocation = $row['image'];
	$widthPercent = $row['widthPercent'];
	$shipSurcharge = $row['shipSurcharge'];
	$frameSurcharge = $row['frameSurcharge'];
	$bothSurcharge = $row['shipAndFrame'];
	$dimensionsPainted = $row['dimensionsPainted'];
	$dimensionsFramed = $row['dimensionsFramed'];
	$otherItem = $row['otherRedirect'];
	
	echo '<img class="individual" src="Images/' . $imageLocation . '" alt="' . $title . '" /><br>' . "\r\n";
	if ($dimensionsPainted > ' ') {echo '<p>Dimensions painted are ' . $dimensionsPainted . ' inches</p>' . "\r\n";}
	if ($dimensionsFramed > ' ') {echo '<p>Dimensions framed are ' . $dimensionsFramed . ' inches</p>' . "\r\n";}
	echo '<p>' . $priceDisp . '</p>' . "\r\n";
	if ($quantity > 0) {
  	   if ($shipSurcharge > 0) {echo '<p>Shipping Surcharge is $' . ($shipSurcharge/100) . '</p>' . "\r\n";}
	   if ($frameSurcharge > 0) {echo '<p>Framing Surcharge is $' . ($frameSurcharge/100) . '</p>' . "\r\n";}
	   if ($bothSurcharge > 0) {echo '<p>Surcharge for both framing and shipping is $' .  ($bothSurcharge/100) . '</p>' . "\r\n";}
	}   
	if ($otherItem > ' ') {
	   echo '<p>A PRINT of this item is available <a href="dispOneItem.php?id=' . $otherItem . '">here</a></p>' . "\r\n";
	   }

	echo '<p id="widthPercent" style = "visibility:hidden">' . $widthPercent . '</p>' . "\r\n"; 
?>               


    </section>
</body>
</html>