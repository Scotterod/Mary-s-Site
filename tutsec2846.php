<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>    
    <title>Mary Jansen: Tutorial Menu</title>
</head>
<body>
    <header>
        <img class="banner" src="Images/tiger head.jpg" alt="Tiger Miniature" />
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
    <hr>
    <section>
        <h1>Welcome to Unlimited access to Mary Jansen's Tutorials</h1>
        <h2>Please select the tutorial video below</h2>
        <ol>
            <li>Purchasing Supplies</li>
            <li>Preparing Space and Time</li>
            <li>Pencil Sketching Your Plan</li>
            <li>Mixing Colors</li>
            <li>Background Items</li>
            <li>Foreground Items</li>
            <li>Finishing Touches</li>
        </ol>
    </section>

</body>
</html>