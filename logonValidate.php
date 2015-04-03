
<?php
// This receives input from Logon Form, validates, and branches user to new destination.

$nameInput = $_POST['nameInput'];
$passwordInput = $_POST['passwordInput'];

$host = "localhost";
$user = "root";
$password = "brainHurts5294#";

$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
mysql_select_db ("maryart" , $cxn);
 
$sql = "Select * from customers";

$result = mysql_query($sql, $cxn);

while($row = mysql_fetch_array($result)) {
   $username = $row['userName'];
   $pass = $row['password'];
   if (($username == $nameInput) and
      ($pass == $passwordInput)) {
      echo 'Welcome';
      header("Location: tutsec2846.html");
}
echo 'username and password are not authorized';
header("Location: Tutorials.html");
?>