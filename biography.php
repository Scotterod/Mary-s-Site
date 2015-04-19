<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="stylesheetB.css" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>
    <title>Mary Jansen: Biography</title>
</head>
<body>
    <header>

        <img class="banner" src="Images/koi head.jpg" alt="Koi Painting" />
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
                <div class="menubox">Biography</div>
                <div class="menubox"><a href="contact.php">Contact Us</a></div>
        </nav>
    </header>
    <hr><br><br><br>
    <section>
        <img id="bioImage" src="Images/MaryChair.jpg" alt="Mary with Squirrel" width="250" />
        <h1 class="introPara"><span class="introLetter">M</span>ary Jansen</h1>
        <p>Mary Jansen’s passion for art has always been a defining attribute. She rarely is seen without a pencil or brush in hand, for her muse constantly challenges her to meet new heights in ideas and inspiration. Art for her is a spiritual process. She teaches that a painting isn’t merely a replica of what one sees but an expression of that which is otherwise ineffable. Commencement of a painting to the finish is not a formulaic process where one methodically follows prescribed steps. It is a spiritual journey that requires thoughtful preparation and experimentation that enhances the “thought” or “mood” one has set out to achieve. While working on a piece Mary will often talk to her composition in order to create a personal working relationship with her piece. Her process is intuitive but backed by years of disciplined mastery from countless hours of work and instruction.</p>

        <p>Mary has an MFA in Graphic Design but her true calling is that of transparent watercolor. Years of attention to detail in the graphics world led her to pursue fine art in miniature. In this unique genre Mary has participated in many national and international shows throughout the country and has won awards in almost all of them. She has earned coveted letters in MPSGS, (Miniature Painters, Sculpters and Gravers Society of Washington, D.C.) and MAA, (Miniature Artists of America). She has also won the “Excellence in All Entries” award in MASF, the largest miniature annual exhibition in the nation.</p>

        <p>Larger works are also important to Mary. Her work focuses primarily on avian art and landscapes but she is versatile in her approach. If a still life radiates with perfect lighting or the movement of koi in a pond mesmerizes the soul, Mary will not hesitate to paint these subjects. To ignore such beauty close at hand is to deny the spirit that compels one to create. Pushing herself to explore new methods of application further emphasizes the “message” or “thought” of her compositions and this has led her to develop a much sought-after style. She participates in watercolor shows throughout the country and has earned her letters in the prestigious TWSA (Transparent Watercolor Society of America). She continues to participate in juried shows and also enjoys teaching classes, lecturing and giving private lessons along the way. Mary is privileged to be among those who contribute beauty and deeper meaning to an otherwise mundane world.
        </p>
    </section>
    <br /><hr />
    <article>
        <h1>What Others Say About Mary</h1>
        <h2>Awards and Honors from Juried Shows</h2>
        
<?php        
	$sql = "SELECT * FROM mj_bioBlurbs ORDER BY blurbYear DESC";

	$result = mysql_query($sql, $cxn);

	while($row = mysql_fetch_array($result)) {
		$blurbYear = $row['blurbYear'];
		echo '<h3>' . $blurbYear . '</h3>' . "\r\n";		
		for($i = 0; $i<12; $i++) {
		   $blurbName = 'blurb' + ((string)($i+1));
		   if($row[$blurbName] > ' ') {
		      echo '    <p>' . str_replace("'", "&rsquo;", $row[$blurbName]) . '</p>' . "\r\n";
	   	   } else {
	   	      $i=12;
	   	      };
	   	};      
	}
?>    

    </article>
</body>
</html>