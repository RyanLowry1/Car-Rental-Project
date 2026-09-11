<?php
// Name : Ryan Lowry
// Date : 04/02/2025
// Student Number : C00305950
$hostname = "localhost:3306";
$username = "Car_Rental";
$password = "YOUR_DATABASE_PASSWORD";
$dbname   = "CarRentals";
$con = mysqli_connect($hostname,$username,$password,$dbname);
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}
// Retrieve company details from the submitted form data
$CompanyID = $_POST['delid'];
$CompanyName = $_POST['delname'];
$Address = $_POST['deladdress'];
$PhoneNumber = $_POST['delnumber'];
$WebAddress = $_POST['delwebsite'];
$EmailAddress = $_POST['delemail'];
$CreditLimit = $_POST['delcredit'];
$AmountOwed = $_POST['delamountowed'];
$BlacklistFlag = $_POST['delblacklistflag'];
$NumberTimesBlacklisted = $_POST['delnumberblacklist'];
// Deletes Data from table
$sql = "DELETE FROM Company WHERE CompanyID='$CompanyID'";
if(!mysqli_query($con,$sql))
{
    echo "Error: ".mysqli_error($con);
}
else
{
    if(mysqli_affected_rows($con) != 0)
    {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Company Deleted</title>
         <link rel='stylesheet' type='text/css' href='/Full_Website/resources/Layout.css'> <!--Imports the external stylesheet-->
        </head>
        <body>
        <div class='container'>
        
        <h2>Company Deleted Successfully!</h2> <!--Outputs the deleted company with details-->
    
        <p>Company ID: ".htmlspecialchars($CompanyID)."</p> <!--escaping special characters to prevent XSS-->
        <p>Company Name: ".htmlspecialchars($CompanyName)."</p>
        <p>Address: ".htmlspecialchars($Address)."</p>
        <p>Credit Limit: ".htmlspecialchars($CreditLimit)."</p>
        <p>Phone Number: ".htmlspecialchars($PhoneNumber)."</p>
        <p>Website: ".htmlspecialchars($WebAddress)."</p>
        <p>Email: ".htmlspecialchars($EmailAddress)."</p>
        <h4>The company has been deleted from the database</h4>
        <form action='Delete.html.php' method='POST'>
        <input type='submit' value='Return to Page' class='btn'/>
        </form>
        </div>
        </body>
        </html>
        ";
    }
    else
    {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Company Deleted</title>
        <link rel='stylesheet' type='text/css' href='/Full_Website/resources/Layout.css'> <!--Imports the external stylesheet-->
        </head>
        <body>
        <div class='container'>
        <h2>No Records Found</h2>
        <form action='Delete.html.php' method='POST'>
        <input type='submit' value='Return to Page' class='btn'/>
        </form>
        </div>
        </body>
        </html>
        ";
    }
}
mysqli_close($con);
?>
