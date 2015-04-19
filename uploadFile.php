﻿<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>File Upload from Form Utility</title>
</head>
<body>
   <h1>Sending your file... please wait....</h1>
   <p>
   
﻿<?php
     // GET File Variables 
     $tmpName = $_FILES['upFile']['tmp_name']; 
     $fileType = $_FILES['upFile']['type']; 
     $fileName = $_FILES['upFile']['name']; 
     
     // Reading file ('rb' = read binary) 
     $file = fopen($tmpName,'rb'); 
     $data = fread($file,filesize($tmpName)); 
     fclose($file); 

     // Encoding file data 
     $data = chunk_split(base64_encode($data)); 

?>      
  </p>
  
  <p>Use back arrow on error, or return to <a href="index.php">Home</a></p>
</body>
</html>
	 