<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "quoter";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$brokers = "SELECT * FROM brokers WHERE username = " . "'" . $_SESSION['login_user'] . "'";
$brokersresult = mysqli_query($conn, $brokers);
$brokername = mysqli_fetch_assoc($brokersresult);

$sql = "SELECT * FROM leads WHERE town = " . "'" . $brokername["town"] . "'";


$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

echo "Welcome Back ". $brokername["fname"] . ". You have two new leads";	
echo "<table border='1'> 
<th colspan='8'>List of Leads</th>
<tr>
<th>Ref No.</th>
<th>Name</th>
<th>DOB</th>
<th>Mobile</th>
<th>Email</th>
<th>Location</th>
<th>Product</th>
<th>Uncontactable</th>
</tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["leadID"]. "</td>";
		echo "<td>" . $row["fname"]. " " . $row["lname"] . "</td>";
		echo "<td>" . $row["dob"]. "</td>";
		echo "<td>" . "0" . $row["mnumber"]. "</td>";
		echo "<td>" . $row["email"]. "</td>";
		echo "<td>" . $row["town"]. ", " . $row["county"]. "</td>";
		echo "<td>" . $row["coverType"]. "</td>";
		echo "<td><input type='checkbox' name='buysell' value='buy'><input type='button' value='Submit'></td>";

    }
	echo "</table>";
	echo "<a href='logout.php'>Log Out</a>";
} else {
	header("location: login.php");
}

mysqli_close($conn);
?>
</div>
</body>
</html>