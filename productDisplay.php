<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="stylesheetG.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>    
    <script type="text/javascript" src="/Scripts/gallery.js"></script>    
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
    <hr /><br /><br /><br />
    <section>
       <table>
          <col width="50">
          <col width="260">
          <col width="300">
<?php
	$category = $_GET['category'];

	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
	
 
	$sql = "SELECT * FROM mj_productMaster " .
	        "WHERE category = '" . $category . "' " .
	        "ORDER BY subCategory, quantity DESC;";

	$products = mysql_query($sql, $cxn);

	$sql = "SELECT * FROM mj_typeMaster " .
	        "WHERE category = '" . $category . "' " .
	        "ORDER BY displayOrder;";

	$mainTypes = mysql_query($sql, $cxn);
		
	while($row = mysql_fetch_array($products)) {
		$prodId = $row['ID'];
		$title = $row['title'];
		$description = $row['description'];
		$basePrice = $row['basePrice'] / 100.00;
		$quantity = $row['quantity'];
                if ($quantity > 0) {$priceDisp = '$' . $basePrice;}
                else {$priceDisp = 'SOLD';}		
		$imageLocation = $row['thumbnail'];
		$hrefBase = '<a href="dispOneItem.php?id=' . $prodId . '"><img class = "gallery" src="Images/';
		echo '<tr>' . "\r\n";
		  echo '  <td>' . $title . '<br>' . $priceDisp . '</td>' . "\r\n";
                  echo '  <td>' . $description . '</td>' . "\r\n";
                  echo '  <td>' . $hrefBase . $imageLocation . '"/></a></td>' . "\r\n";
                echo '</tr>' . "\r\n";
	}

?>               
       </table>

    </section>
</body>
</html>