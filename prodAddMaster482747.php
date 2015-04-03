<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="stylesheetG.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>    
    <title>Product Maintenance</title>
</head>
<body>
    <header>
        <nav>
           <ul>
               <li><a href="index.html">Home</a></li>
               <li><a href="galleries.php">Galleries</a></li>
                <li><a href="services.html">Services</a></li>
               <li><a href="biography.html">Biography</a></li>
               <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <hr /><br /><br /><h1>If you got to this screen, please tell Mary immediately how you did it.
        This screen is used only to add new products to the gallery of items for sale.</h1><br />
    <section>
      <form method="POST" action="prodAddMasterRecord482747.php" enctype="multipart/form-data">
      <p>Pick a category</p>
       <select id="category" name="category">
<?php
/************This section fills the dropbox for the type categories that are allowed********/
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
		   echo '<option value="' . $category . '">' . $category . '</option>' . "\r\n";
		   $lastCategory = $category;
		}
	}
	$subcatstring .= '!';
?>               
       </select><br>
       <p>Pick a subcategory</p>
	<select id="subcat" name="subcat">';
	 <option value="ALL">ALL</option>'
<?php
/**********This section fills the subCategory dropbox options*******/

        $subcats = explode(',' , $subcatstring);
//        echo $subcats[0] . $subcats[1] . $subcats[2] . $subcats[3];
        $counter = 0;
        while ($subcats[$counter] != '!') {
          if ($subcats[$counter] != 'ALL') {
            echo '<option value="' . $subcats[$counter] . '">' . $subcats[$counter] . '</option>' . "\r\n";
            }
          $counter++;
       };

?>       
       </select><br>
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
            <p>Thumbnail Filename</p> 
            <p><label><input type="text" name="thumbnailInput" placeholder="thumbnail" maxlength="30"></label></p><br>
            <p>Fullsize Filename</p> 
            <p><label><input type="text" name="imageInput" placeholder="big file" maxlength="30"></label></p><br>
            <p>Dimensions as Painted (eg. 10.5 X 16.75)</p> 
            <p><label><input type="text" name="dimPaintedInput" maxlength="20"></label></p><br>
            <p>Dimensions as Framed</p> 
            <p><label><input type="text" name="dimFramedInput" maxlength="20"></label></p><br>                                         
            <p> <input type="submit" value="Submit"></p><br>
            <p> <input type="reset" value="Reset Values"></p>
       </form>
    </section>

<?php
/*
      if (isset(titleInput)) {
	$sql = "INSERT into mj_productMaster " .
	        "(`title`, `description`, `category`, `subCategory`, `quantity`, `basePrice`, `shipSurcharge`, `frameSurcharge`, `shipAndFrame`, `thumbnail`, `image`, `dimensionsPainted`, `dimensionsFramed`, `otherRedirect`) " .
	        "VALUES ($_POST['titleInput'],$_POST['descriptionInput'],$_POST['category'],$_POST['subcat'],$_POST['quantityInput']," .
	        "$_POST['basePriceInput'],$_POST['shipChargeInput'],$_POST['frameChargeInput'],$_POST['shipFrameChargeInput']," .
	        "$_POST['thumbnailInput'],$_POST['imageInput'],$_POST['dimPaintedInput'],$_POST['dimFramedInput']";

	if ($result = mysql_query($sql, $cxn)) {
	    echo 'entry added!';
	    } else {
	    echo 'ERROR--nothing was added!';
	    };
      }
*/
?>               
    
    
</body>
</html>