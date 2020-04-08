<!DOCTYPE html>
<!--	Author: Miles Hollifield
		Date:	4/6/2020
		File:	name-change.php
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
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$userQuery = "UPDATE personnel SET lastName = 'Jackson', jobTitle = 'Manager' WHERE empID = '12353'"; // ADD QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}
else
{
	print("	<h1>UPDATE</h1>");
	print ("<p>The employee update has been completed.</p>");
}


mysqli_close($connect);   // close the connection
 
?>

</body>
</html>
