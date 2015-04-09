<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="A site to find watercolor paintings for sale and advice on how to create them">
    <meta name="keywords" content="Mary Jansen, watercolor, miniature, painting, artist, tutorial, critique">
    <title>Mary Jansen | Watercolor Artist</title>
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>
</head>

<body>
    <header>
        <img class="banner" src="Images/homeBanner.jpg" alt="Flamingo Painting" />
 
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
    <br /><hr>
    <section>
        <br /><br /><br /><br />
        <img id="homeImage" src="Images/MarySmile.jpg" alt="Mary Jansen" />
        <h3>
            Welcome! Art is my passion and provides me the challenge of relaying this amazing and beautiful world through the filter of my soul.  I hope that you too will be moved by my interpretation and see the wonder and worldly beauty that I find so compelling.
        </h3>

        <ul>
            <li>See Mary&rsquo;s beautiful products for sale (or sold) in <a href="productDisplay.php?category=watercolors">Galleries</a></li>
            <li>Request a critique, tutorial, or other <a href="services.php">service</a></li>
            <li>See her <a href="biography.php">Biography</a></li>
            <li>Or send an email with a <a href="contact.php">comment/question</a></li>

        </ul>
        <p></p><br>
    </section>
</body>
</html>