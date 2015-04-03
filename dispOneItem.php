<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>    
    <script type="text/javascript" src="/Scripts/dispOneItem.js"></script>  
    <title>Mary Jansen: Products</title>
</head>
<body>
    <header>
        <nav>

                <div class="menubox"><a href="index.php">Home</a></div>
                <div class="menubox dropper"><a href="productDisplay.php?category=watercolors">Galleries</a>
                   <ul class="submenu">
<?php
// This php reads the mysql table to see what types of products are to be displayed on the gallery sub-menu.
	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
 
	$sql = "SELECT DISTINCT category FROM mj_typeMaster
	        WHERE displayOrder < 9990
	        ORDER BY displayOrder";

	$result = mysql_query($sql, $cxn);

	while($row = mysql_fetch_array($result)) {
		$category = $row['category'];
		echo '                    <li><a href="productDisplay.php?category=' . $category . '">' . $category . '</a></li>' . "\r\n";
	}
?>    
                   </ul></div>                
                <div class="menubox dropper"><a href="services.php">Services</a>
                   <ul class="submenu">
                      <li><a href="critiques.php">Critiques</a></li>
                      <li><a href="tutorials.php">Tutorials</a></li>
                   </ul></div>  
                <div class="menubox"><a href="biography.php">Biography</a></div>
                <div class="menubox"><a href="contact.php">Contact Us</a></div>
        </nav>
    </header>
    <hr />
    <h1>This Should be a Pop up window and not a straight link, but for now, just go back on browser back arrow.</h1><br /><br />
    <section>
   
<?php
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
        if ($quantity > 0) {$priceDisp = '$' . $basePrice;}
        else {$priceDisp = 'SOLD';}		
	$imageLocation = $row['image'];
	$shipSurcharge = $row['shipSurcharge'];
	$frameSurcharge = $row['frameSurcharge'];
	$bothSurcharge = $row['shipAndFrame'];
	$dimensionsPainted = $row['dimensionsPainted'];
	$dimensionsFramed = $row['dimensionsFramed'];
	$otherItem = $row['otherRedirect'];
	
	echo '<img class="individual" src="Images/' . $imageLocation . '" />';
	if ($dimensionsPainted > ' ') {echo '<p>Dimensions painted are ' . $dimensionsPainted . '</p>';}
	if ($dimensionsFramed > ' ') {echo '<p>Dimensions framed are ' . $dimensionsFramed . '</p>';}
	echo '<p>Base Price is ' . $priceDisp . '</p>';
	if ($shipSurcharge > 0) {echo '<p>Shipping Surcharge is $' . ($shipSurcharge/100) . '</p>';}
	if ($frameSurcharge > 0) {echo '<p>Framing Surcharge is $' . ($frameSurcharge/100) . '</p>';}
	if ($bothSurcharge > 0) {echo '<p>Surcharge for both framing and shipping is $' .  ($bothSurcharge/100) . '</p>';}
	if ($otherItem > ' ') {
	   echo '<p>A PRINT of this item is available <a href="dispOneItem.php?id=' . $otherItem . '">here</a></p>';
	   }

        $sql = "SELECT widthPercent from mj_typeMaster " .
               "WHERE category = '" .$category . "';";

	$imageSetting = mysql_query($sql, $cxn);

	$row = mysql_fetch_array($imageSetting);             
	$widthPercent = $row['widthPercent'];
	echo '<p id="widthPercent" style = "visibility:hidden">' . $widthPercent . '</p>'; 
?>               


    </section>
</body>
</html>