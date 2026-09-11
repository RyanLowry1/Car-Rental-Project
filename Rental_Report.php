<!--Name : Ryan Lowry-->
<!--Student Number : C00305950-->
<!--Date : 25/02/2026-->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/Full_Website/resources/Layout.css">
<title>Rental Report</title>
</head>
<body>
<?php 
   include $_SERVER['DOCUMENT_ROOT'] .  '/Full_Website/resources/menu.php';
   include $_SERVER['DOCUMENT_ROOT'] . '/Full_Website/resources/db.inc.php';
    date_default_timezone_set('UTC');
?>
<form action="Rental_Report.php" method="post" name="reportForm">
<input type="hidden" name="choice">
</form>
<h2>Rental Report</h2>
<h3>(Click a button to see the Rental Report in the desired order)</h3>
<!-- Buttons to sort the report by date, company, or cost-->
<div class = "report-controls">
<input type="button" id="dateButton" class = "report-btn" value="Date Order" onclick="dateOrder()">
<input type="button" id="companyButton" class = "report-btn" value="Company Order" onclick="companyOrder()">
<input type="button" id="costButton" class = "report-btn" value="Cost Order" onclick="costOrder()">
</div>
<br><br>
<script>
// Set sorting option to date and submit the report form
function dateOrder()
{
    document.reportForm.choice.value = "date";
    document.reportForm.submit();
}
// Set sorting option to company and submit the report form
function companyOrder()
{
    document.reportForm.choice.value = "company";
    document.reportForm.submit();
}
// Set sorting option to cost and submit the report form
function costOrder()
{
    document.reportForm.choice.value = "cost";
    document.reportForm.submit();
}
</script>
<?php
$choice = "date";  // Sets default choice to date
if (isset($_POST['choice']))
{
    $choice = $_POST['choice'];
}
if ($choice == "date")
{
?>
<script>
document.getElementById("dateButton").disabled = true;
document.getElementById("companyButton").disabled = false;
document.getElementById("costButton").disabled = false;
</script>
<?php
// SQL query with company details, ordered by most recent rental date
$sql = "SELECT 
RentalAgreement.RentalDate,
Company.CompanyName,
Company.Address,
RentalAgreement.RentalDuration,
RentalAgreement.RentalCost
FROM RentalAgreement
INNER JOIN Company
ON RentalAgreement.CompanyID = Company.CompanyID
WHERE RentalAgreement.ReturnDate IS NOT NULL
ORDER BY RentalAgreement.RentalDate DESC";
}
elseif ($choice == "company")
{
?>
<script>
document.getElementById("companyButton").disabled = true;
document.getElementById("dateButton").disabled = false;
document.getElementById("costButton").disabled = false;
</script>
<?php
// SQL query with company details, ordered alphabetically by company name
$sql = "SELECT 
RentalAgreement.RentalDate,
Company.CompanyName,
Company.Address,
RentalAgreement.RentalDuration,
RentalAgreement.RentalCost
FROM RentalAgreement
INNER JOIN Company
ON RentalAgreement.CompanyID = Company.CompanyID
WHERE RentalAgreement.ReturnDate IS NOT NULL
ORDER BY Company.CompanyName ASC";
}
else
{
?>
<script>
document.getElementById("costButton").disabled = true;
document.getElementById("dateButton").disabled = false;
document.getElementById("companyButton").disabled = false;
</script>
<?php
// SQL query with company details, ordered by cost 
$sql = "SELECT 
RentalAgreement.RentalDate,
Company.CompanyName,
Company.Address,
RentalAgreement.RentalDuration,
RentalAgreement.RentalCost
FROM RentalAgreement
INNER JOIN Company
ON RentalAgreement.CompanyID = Company.CompanyID
WHERE RentalAgreement.ReturnDate IS NOT NULL
ORDER BY RentalAgreement.RentalCost DESC";
}
produceReport($con, $sql); // Call function to output report table
function produceReport($con, $sql) // Function to generate HTML table from SQL results
{
$result = mysqli_query($con, $sql); // Execute SQL query
if(!$result)
{
    die("SQL Error: " . mysqli_error($con));
}
echo "<table border='1'>"; // Start table
echo "<tr>
<th>Date of Rental</th>
<th>Company Name</th>
<th>Town</th>
<th>Duration of Rental</th>
<th>Cost of Rental</th>
</tr>";
while ($row = mysqli_fetch_array($result)) // Loop through each row of results
{
$date = date_create($row['RentalDate']);
$FDate = date_format($date, "d/m/Y");
echo "<tr>";
// Output data
echo "<td>".$FDate."</td>";
echo "<td>".$row['CompanyName']."</td>";
echo "<td>".$row['Address']."</td>";
echo "<td>".$row['RentalDuration']."</td>";
echo "<td>".$row['RentalCost']."</td>";
echo "</tr>";
}
echo "</table>";
}
mysqli_close($con);
?>
<script src="/Full_Website/resources/Test.js"></script> 
</body>
</html>
