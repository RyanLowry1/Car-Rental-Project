<!-- Name : Ryan Lowry-->
<!-- Date : 05/02/2025-->
<!-- Student Number : C00305950 -->
<!DOCTYPE html>
<html>
<head>
    <title>Add Company</title>
    <link rel="stylesheet" type="text/css" href="/Full_Website/resources/Layout.css"> <!--Imports the external stylesheet-->
    <script defer src="AddCompany.js"></script> <!-- Links javascript file-->
    <script src="/Full_Website/resources/AddCompany.js"></script>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Full_Website/resources/menu.php'; ?>
<div class="container">
<form id="form" action="AddCompany.php" method="post"> 
    <h2>Add Company</h2>
    <div class="inputbox"> <!-- Input box for Company name-->
        <label for="CompanyName">Company Name:</label>
        <!-- Text input for name , required , only letters , spaces , and periods allowed -->
        <input type="text" id="name" name="name" placeholder="Company Name" title = " 1-50 Characters Only" pattern="[A-Za-z .]{1,50}" required> 
    </div>
    <div class="inputbox"> <!--Input box for address-->
        <label for="Address"> Company Address:</label>
        <!-- Text input for address , required , letters , numbers , spaces , periods , and commas allowed -->
        <input type="text" id="address" name="address" placeholder="Company Address" title = " 1-100 Characters Only" pattern="[A-Za-z0-9 ,.\-]{1,100}" required>
    </div>
    <div class="inputbox"> <!--Input box for Phone Number-->
        <label for="PhoneNumber">Phone Number:</label> 
        <!-- Text input for phone number , accepts digits and spaces-->
        <input type="text" id="phone" name="phone" placeholder="Phone Number" pattern="[0-9 ]{1,16}" title = " 1-15 Numbers Only" required>
    </div>
    <div class="inputbox">
        <label for="WebAddress">Website Address : </label> <!-- Input box for Web Address-->
        <!-- Only allows url input-->
        <input type="url" id="webaddress" name="webaddress" placeholder=" Website Address" pattern="https?://.+\.(com|ie)(/.*)?$" title = "Only allows .com or .ie" required>
    </div>
    <div class="inputbox"> <!--Input box for company email-->
        <label for="EmailAddress"> Company Email :</label>
        <!-- email input required-->
        <input type="email" id="email" name="email" placeholder="Company Email"  maxlength="50" title = " Maximum 50 Characters" required>
    </div>
    <div class="inputbox"> <!-- Input box for Credit Limit-->
        <label for="CreditLimit">Credit Limit : </label>
        <!-- Number input , required-->
        <input type="number" id="creditlimit" name="creditlimit" placeholder=" Credit Limit"  value="1000" min="0" step="1" title = "Credit Limit must be greater than or equal to 0 " required> 
    </div>
    <!-- 2 Buttons to submit form or clear form -->
    <div class="button-group">
        <button type="submit">Submit</button>
        <button type="reset" id="clearBtn">Clear</button>
    </div>
</form>
</div>
        <script src="/Full_Website/resources/Test.js"></script>
</body>
</html>
