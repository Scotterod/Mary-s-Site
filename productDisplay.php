<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="stylesheetG.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/productDisplay.js"></script>    
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
		$categoryURL= str_replace(" ", "+", $category);
		echo '                    <li><a href="productDisplay.php?category=' . $categoryURL . '">' . $category . '</a></li>' . "\r\n";
	}
?>    
                   </ul></div>                
                <div class="menubox dropper"><a href="services.php">Services</a>
                   <ul class="submenu">
                      <li><a href="register.php">Registration</a></li>
                      <li><a href="critiques.php">Critiques</a></li>
                      <li><a href="tutorials.php">Tutorials</a></li>
                   </ul></div>  
                <div class="menubox"><a href="biography.php">Biography</a></div>
                <div class="menubox"><a href="contact.php">Contact Us</a></div>
        </nav>
    </header>
    <hr /><br /><br /><br />
    <aside>
        
        
<?php
	$category = $_GET['category'];
	$useSubCat = false;
	$sql = "SELECT subCategory FROM mj_typeMaster WHERE category = '" . $category . "';";
	$testNullTemp = mysql_query($sql, $cxn);
	$row = mysql_fetch_array($testNullTemp);
	$row = mysql_fetch_array($testNullTemp);
	if ($row) {
	      $useSubCat = true;
	      echo '<h1>Contents...</h1>';
	      $sql = "SELECT subCategory FROM mj_typeMaster WHERE category = '" . $category . "' ORDER BY displayOrder;";
	      $result = mysql_query($sql, $cxn);
	      while($row = mysql_fetch_array($result)) {
	         $subCat=$row['subCategory'];
		 echo '   <h2><a href="#' . $subCat . '">' . $subCat . '</a></h2>' . "\r\n";
	      };	      
	      
	};	
	
/*******This was to put heading blurbs for each subcategory
        $sql = "SELECT intro, subCategory FROM mj_typeMaster WHERE category = '" . $category . "' ORDER BY displayOrder;";
	$result = mysql_query($sql, $cxn);
	if ($useSubCat) {
	    while($row = mysql_fetch_array($result)) {
		echo '   <br><p>' . $row['intro'] . '</p>' . "\r\n";
	    };
	};
**********/
?>       

    </aside>
    <section><article>
       <table>

<?php


	if ($useSubCat) { 
        	$sql = "SELECT * FROM mj_productMaster M, mj_typeMaster T WHERE M.category = T.category AND M.subCategory = T.subCategory " .
		        "AND M.category = '" . $category . "' " .
	        	"ORDER BY T.displayOrder, M.quantity DESC, M.dispOrder;";
	        } else {
	        $sql = "SELECT * FROM mj_productMaster WHERE category = '" . $category . "' ORDER BY quantity DESC, dispOrder;";
	        }

	$products = mysql_query($sql, $cxn);
	
        $lastSubCat = 'x';
        
	while($row = mysql_fetch_array($products)) {
		$prodId = $row['ID'];
		$subCat = $row['subCategory'];
		$title = $row['title'];
		$description = $row['description'];
		$basePrice = $row['basePrice'] / 100.00;
		$quantity = $row['quantity'];
                if ($quantity > 0) {$priceDisp = '$' . $basePrice;}
                else {$priceDisp = 'SOLD';}		
		$imageLocation = $row['thumbnail'];
		$hrefBase = '<a href="dispOneItem.php?id=' . $prodId . '" target ="_blank"><img class = "gallery" src="Images/';
                if ($subCat != $lastSubCat and $lastSubCat != 'x') {
                     echo '<tr><td><br id="' . $subCat . 'br"><br></td><td></td><td></td></tr>' . "\r\n";
                     }
		echo '<tr>' . "\r\n";
                echo '  <td>' . $hrefBase . $imageLocation . '" alt="' . $title . '"/></a></td>' . "\r\n";		
		if ($subCat != $lastSubCat) {  
		      echo '  <td><a id="' . $subCat . '"></a>' . $title . '<br>' . $priceDisp . '</td>' . "\r\n";
		  } else {
		      echo '  <td>' . $title . '<br>' . $priceDisp . '  </td>' . "\r\n";
		  };
                 echo '  <td>' . $description . '  </td>' . "\r\n";
                 echo '</tr>' . "\r\n";
		 $lastSubCat = $subCat;                   
	}

?>               
       </table>
    </article></section>
    <br><hr><br>
    <footer>website designed by Scott Jansen</footer>
</body>
</html>