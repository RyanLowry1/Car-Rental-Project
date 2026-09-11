<?php
// Name : Ryan Lowry
// Date : 04/02/2025
// Student Number : C00305950
$hostname = "localhost:3306";
$username = "Car_Rental";
$password = "YOUR_DATABASE_PASSWORD";
$dbname   = "CarRentals";
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
// Retrieve company details from the submitted form data
$CompanyName = $_POST['name'];
$Address = $_POST['address'];
$PhoneNumber = $_POST['phone'];
$WebAddress = $_POST['webaddress'];
$EmailAddress = $_POST['email'];
$CreditLimit = $_POST['creditlimit'];
//Inserts Data into Table
$sql = "INSERT INTO Company
(CompanyName, Address, PhoneNumber, WebAddress, EmailAddress, CreditLimit)
VALUES ('$CompanyName', '$Address', '$PhoneNumber', '$WebAddress', '$EmailAddress', '$CreditLimit')";
if (!mysqli_query($conn, $sql))
{
    die ("<div class='error'>An Error in the SQL Query: " . mysqli_error($conn) . "</div>");
}
echo "
<!DOCTYPE html>
<html>
<head>
    <title>Company Added</title>
    <link rel='stylesheet' type='text/css' href='/Full_Website/resources/Layout.css'> <!--Imports the external stylesheet-->
</head>
<body>
<div class='container'>
    <h2>Company Added Successfully!</h2>
    <p>The company has been added to the database</p>
    <form action='Add_Company.html.php' method='POST'>
        <input type='submit' value='Return to Page' class='btn'/>
    </form>
</div>
</body>
</html>
";
mysqli_close($conn);
?>
