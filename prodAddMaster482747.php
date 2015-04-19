<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>
    <title>Product Maintenance</title>
</head>
<body>
    <header>
        <nav>

                <div class="menubox">Home</div>
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
    <hr /><br /><br /><h1>If you got to this screen, please tell Mary immediately how you did it.
        This screen is used only to add new products to the gallery of items for sale.</h1><br />
    <section>
      <form method="POST" action = "prodAddMasterRecord482747.php" enctype="multipart/form-data">
      <p>Pick a category</p>
      
<?php
/************This section fills the radio for the type categories that are allowed********/
	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
 
	$sql = "SELECT category, subCategory from mj_typeMaster " .
	        "ORDER BY displayOrder;";

	$result = mysql_query($sql, $cxn);
	$lastCategory = 'x';
	$subcatstring = '';
	while($row = mysql_fetch_array($result)) {
		$category = $row['category'];
		$subCategory = $row['subCategory'];
		$subcatstring .= $subCategory . ',';
		if ($lastCategory != $category) {
                   echo '<br><input type="radio" name="category" value="' . $category . '">' . $category . "\r\n";		   
		   $lastCategory = $category;
		} else {echo '*';};
	}
	$subcatstring .= '!';
?>               
       <br>
       <p>Pick a subcategory</p>
       <input type="radio" name="subCategory" value="" checked>NULL<br>

<?php
/**********This section fills the subCategory radio options*******/

        $subcats = explode(',' , $subcatstring);
        $counter = 0;
        while ($subcats[$counter] != '!') {
          if ($subcats[$counter]) {
            echo '<input type="radio" name="subCategory" value="' . $subcats[$counter] . '">' . $subcats[$counter] . "<br>\r\n";
            }
          $counter++;
       };

?>       

            <p>New Product Title</p>
            <p><label><input type="text" name="titleInput" required placeholder="title" maxlength="30"></label></p><br>
            <p><label>Enter full description (max 250 characters):</label></p>
            <textarea cols="90" rows="3" maxlength="250" name="descriptionInput"></textarea><br>
            <p>Quantity available</p>
            <p><label><input type="number" name="quantityInput" required value="0"></label></p><br>
            <p>Base Price in PENNIES (integer)</p>
            <p><label><input type="number" name="basePriceInput" required value="0"></label></p><br>
            <p>Shipping Surcharge (additional price for shipping)</p>
            <p><label><input type="number" name="shipChargeInput" required value="0"></label></p><br>
            <p>Framing Surcharge</p>
            <p><label><input type="number" name="frameChargeInput" required value="0"></label></p><br> 
            <p>FramingShipping Combo Surcharge</p>
            <p><label><input type="number" name="shipFrameChargeInput" required value="0"></label></p><br>
            <p>Thumbnail Filename on Server</p> 
            <p><label><input type="text" name="thumbnailInput" placeholder="thumbnail" maxlength="30"></label></p><br>
            <p>Upload thumbnail:</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">            
            <input type="file" name="thumbFile" />
            <p>Fullsize Filename on Server</p> 
            <p><label><input type="text" name="imageInput" placeholder="big file" maxlength="30"></label></p><br>
            <p>Upload full file:</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">            
            <input type="file" name="fullFile" />            
            <p>Picture Width as a Percentage</p>
            <p><label><input type="number" name="widthInput" required value="0"></label></p><br>           
            <p>Dimensions as Painted (eg. 10.5 X 16.75)</p> 
            <p><label><input type="text" name="dimPaintedInput" maxlength="20"></label></p><br>
            <p>Dimensions as Framed</p> 
            <p><label><input type="text" name="dimFramedInput" maxlength="20"></label></p><br>   
            <p>Display Order within (sub)category</p>
            <p><label><input type="number" name="dispOrderInput" required value="0"></label></p><br>                                                  
            <p> <input type="submit" value="Submit"></p><br>
            <p> <input type="reset" value="Reset Values"></p>
       </form>
    </section>

</body>
</html>