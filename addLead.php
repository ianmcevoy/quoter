<!--Author Ian McEvoy - 14483462 -->
<!--This php file allows the user to inset information to the leads table-->
<html>
<head>
	<title>Add a lead</title>
</head>
<body>

<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "password";
$dbdatabase = "quoter";

//create connection
$conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbdatabase);

//check connection
if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}
// echo "Connection Successful";

// $leadId = $_POST['post1'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$dob = $_POST['dob'];
$mnumber = $_POST['mNum'];
$email = $_POST['email'];
$town = $_POST['town'];
$county = $_POST['county'];
$coverType = $_POST['coverType'];


$sql = "INSERT INTO leads (fname, lname, dob, mnumber, email, town, county, coverType)
		VALUES ('$fname', '$lname', '$dob', '$mnumber', '$email', '$town', '$county', '$coverType')";

if (mysqli_query($conn, $sql)) {
    echo "Thanks for your information. We will pass your contact details onto a broker who lives nearby and you can expect them to contact you with a quote within one working day.";
} else {
    echo "Error: " . $sql . mysqli_error($conn);
}

//close connection
mysqli_close($conn);
?>
	</body>	
</html>