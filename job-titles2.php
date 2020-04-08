<!DOCTYPE html>
<!--	Author: Miles Hollifield
		Date:	4/6/2020
		File:	job-titles2.php
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

$jobTitle = $_POST['jobTitle'];

$userQuery = "SELECT firstName, lastName FROM personnel WHERE jobTitle = '$jobTitle'";  // ADD THE QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>RESULTS</h1>");
	print("<table border = \"1\">");
	print("<tr><th>FIRST NAME</th><th>LAST NAME</th></tr>");
  while ($row = mysqli_fetch_assoc($result))
  {
    print("<tr><td>".$row['firstName']."</td><td>".$row['lastName']."</td></tr>");
  }
    print ("</table>");
}


mysqli_close($connect);   // close the connection
 
?>
</body>
</html>
