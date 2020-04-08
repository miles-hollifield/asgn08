<!DOCTYPE html>
<!--	Author: Miles Hollifield
		Date:	4/6/2020
		File:	raises.php
		Purpose:MySQL Exercise
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>
<?php
include_once('database/connect.php');
$connect=mysqli_connect(SERVER, USER, PW, DB);

if( !$connect) 
{
	die("ERROR: Cannot connect to database ".DB." on server ".SERVER." 
	using user name ".USER." (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}
$userQuery = "SELECT empID FROM personnel WHERE hourlyWage < 10"; // ADD THE QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from ".DB.": " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>LIST OF EMPLOYEES WHO NEED A RAISE</h1>");
  while ($row = mysqli_fetch_assoc($result))
  {
    print("<p>Employee ".$row['empID']." needs a raise!");
  }
}
  
mysqli_close($connect);   // close the connection
 
?>

</body>
</html>
