<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="stylesheetG.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <title>Mary Jansen: Galleries</title>
</head>
<body>
    <header>
<!--        <img class="banner" src="Images/peony head.jpg" alt="Peony Painting" />-->
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Galleries</li>
                <li><a href="services.html">Services</a></li>
                <li><a href="biography.html">Biography</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <hr><br><br>
    <section>
        <h1>
           Beginning with her fabulous original full-sized watercolors, Mary&rsquo;s creations fall into these categories....
        </h1><br><br>
        <div class="leftbox">

<?php
// This php reads the master table to see what types of products are to be displayed.
	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
 
	$sql = "SELECT category, subCategory, thumbnail FROM mj_typeMaster
	        WHERE displayOrder < 9990
	        ORDER BY displayOrder";

	$result = mysql_query($sql, $cxn);
	$lastType = 'x';
	$switchedBox = false;

	while($row = mysql_fetch_array($result)) {
		$category = $row['category'];
		$catdisp = $category;
		$subcat = $row['subCategory'];
		$subdisp = $subcat;
		$thumbnail = $row['thumbnail'];
		if ($category != $lastType and $lastType != 'x') {
		    echo '<br>';
		    if ($switchedBox == false) {
		       $switchedBox = true;
		       echo '</div>' . "\r\n" . '<div class="rightbox">';
		       }
		    }
		$lastType = $category;
		if ($category == 'fullsize') {$catdisp='';};
		echo '<p>' . $subdisp . ' ' . $catdisp . ' ';
		echo '<form method="GET" action="productDisplay.php" id="' . $category . $subcat . '">';
                echo '<input type="hidden" name="category" value="' . $category . '" />';
                echo '<input type="hidden" name="subcat" value="' . $subcat . '" />';
                echo '<a href="productDisplay.php?category=' . $category . '&subcat=' . $subcat .
                    '" onclick="document.getElementById(&#39;' . $category . $subcat . '&#39;).submit(); return false;">';
 		echo '<img class = "thumbnail" src="Images/' . $thumbnail . '"/></a></form></p>' . "\r\n";
	}

?>    
      </div><hr> 
    </section>
</body>
</html>