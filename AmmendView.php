<?php
// Name : Ryan Lowry
// Date : 04/02/2025
// Student Number : C00305950
$hostname = "localhost:3306";
$username = "Car_Rental";
$password = "YOUR_DATABASE_PASSWORD";
$dbname   = "CarRentals";
$con = mysqli_connect($hostname, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// Retrieve company details from the submitted form data
$CompanyName = $_POST['amendcompanyname'];
$Address = $_POST['amendaddress'];
$CreditLimit = $_POST['amendcreditlimit'];
$PhoneNumber = $_POST['companyphonenumber'];
$WebAddress = $_POST['companywebaddress'];
$EmailAddress = $_POST['companyemailaddress'];
$CompanyID = $_POST['companyid'];
$AmountOwed = $_POST['amountowed'];
$BlacklistFlag = $_POST['blacklistflag'];
$NumberTimesBlacklisted = $_POST['numberblacklist'];
// Inserts Data Into Table
$sql = "UPDATE Company 
        SET CompanyName='$CompanyName', 
            Address='$Address', 
            CreditLimit='$CreditLimit', 
            PhoneNumber='$PhoneNumber', 
            WebAddress='$WebAddress', 
            EmailAddress='$EmailAddress'
            AmountOwed = '$AmountOwed' ,
            BlacklistFlag = '$BlacklistFlag' ,
            NumberTimesBlacklisted = '$NumberTimesBlacklisted' ,
        WHERE CompanyID='$CompanyID'";
// Executes update query and displays success message or error
if (!mysqli_query($con, $sql)) {
    echo "Error: " . mysqli_error($con);
} else {
    if (mysqli_affected_rows($con) != 0) {
        echo mysqli_affected_rows($con) . " record(s) updated <br>";
        echo "Company ID $CompanyID, $CompanyName, $Address, $CreditLimit, $PhoneNumber, $WebAddress, $EmailAddress, $AmountOwed, $BlacklistFlag , $NumberTimesBlacklisted has been updated.";
    } else {
        echo "No records were changed.";
    }
}
mysqli_close($con);
?>
echo "
<!DOCTYPE html>
<html>
<head>
    <title>Company Added</title>
    <link rel="stylesheet" type="text/css" href="/Full_Website/resources/Layout.css"> <!--Imports the external stylesheet-->
</head>
<body>
<!-- Displays confirmation message with company details and provides button to return to previous page -->
<div class='container'>
    <h2>Company Updated Successfully!</h2>
    <h4><p>Company ID: <?php echo htmlspecialchars($CompanyID); ?></p>
    <p>Company Name: <?php echo htmlspecialchars($CompanyName); ?></p>
    <p>Address: <?php echo htmlspecialchars($Address); ?></p>
    <p>Credit Limit: <?php echo htmlspecialchars($CreditLimit); ?></p>
    <p>Phone Number: <?php echo htmlspecialchars($PhoneNumber); ?></p>
    <p>Website: <?php echo htmlspecialchars($WebAddress); ?></p>
    <p>Email: <?php echo htmlspecialchars($EmailAddress); ?></p>
    <p>The company has been updated on the database</p></h4>
    <form action='AmendView.html.php' method='POST'>
    <input type='submit' value='Return to Page' class='btn'/>
</form>
</div>
</body>
</html>
";
