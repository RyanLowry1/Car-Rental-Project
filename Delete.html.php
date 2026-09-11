<!-- Name : Ryan Lowry -->
<!-- Date : 11/03/2026 -->
<!-- Student Number : C00305950 -->
<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/Full_Website/resources/Layout.css"> <!--Imports the external stylesheet-->
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Full_Website/resources/menu.php'; ?>    
<div class="container">
<h2>Delete a Company</h2>
<h4>Please select a company and then click the delete button</h4>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Full_Website/listboxes/Amend_Company_Listbox.php'; ?>
<script>
// Populate form fields with selected company details from the listbox
function populate()
{
    var sel = document.getElementById("listbox");
    if(sel.selectedIndex == -1)
        return;
    var result = sel.options[sel.selectedIndex].value; // Gets the value of the currently selected from a dropdown list
    var companyDetails = result.split(','); // Splits the selected value string into an array
    document.getElementById("display").innerHTML =
    "The details of the selected company are: " + result;
    document.getElementById("delid").value = companyDetails[0];
    document.getElementById("delname").value = companyDetails[1];
    document.getElementById("deladdress").value = companyDetails[2];
    document.getElementById("delnumber").value = companyDetails[3];
    document.getElementById("delwebsite").value = companyDetails[4];
    document.getElementById("delemail").value = companyDetails[5];
    document.getElementById("delcredit").value = companyDetails[6];
    
    document.getElementById("delamountowed").value = companyDetails[7];
    document.getElementById("delblacklistflag").value = companyDetails[8];
    document.getElementById("delnumberblacklist").value = companyDetails[9];
}
// Validate deletion rules and confirm before enabling fields for company deletion
function confirmCheck()
{
    var amountOwed = parseFloat(document.getElementById("delamountowed").value);
    var blacklistFlag = document.getElementById("delblacklistflag").value;
    if(amountOwed > 0 || blacklistFlag == 1)
    {
        alert("Cannot delete this company.\n\nReason:\n" +
              (amountOwed > 0 ? "- Company owes money\n" : "") +
              (blacklistFlag == 1 ? "- Company is blacklisted" : ""));
        return false;
    }
    var response = confirm("Are you sure you want to delete this company?");
    if(response)
    {
        document.getElementById("delid").disabled = false;
        document.getElementById("delname").disabled = false;
        document.getElementById("deladdress").disabled = false;
        document.getElementById("delnumber").disabled = false;
        document.getElementById("delwebsite").disabled = false;
        document.getElementById("delemail").disabled = false;
        document.getElementById("delcredit").disabled = false;
        document.getElementById("delamountowed").disabled = false;
        document.getElementById("delblacklistflag").disabled = false;
        document.getElementById("delnumberblacklist").disabled = false;
        return true;
    }
    else
    {
        populate(); 
        return false; // Calls populate function and prevents further action
    }
}
</script>
<!-- Displays Form -->
<p id="display"></p>
<form name="deleteForm" action="delete.php" method="post" onsubmit="return confirmCheck()">
<label for="delid">Company ID</label>
<input type="text" name="delid" id="delid" disabled>
<label for="delname">Company Name</label>
<input type="text" name="delname" id="delname" disabled>
<label for="deladdress">Company Address</label>
<input type="text" name="deladdress" id="deladdress" disabled>
<label for="delnumber">Phone Number</label>
<input type="text" name="delnumber" id="delnumber" disabled>
<label for="delwebsite">Company Website</label>
<input type="text" name="delwebsite" id="delwebsite" disabled>
<label for="delemail">Company Email</label>
<input type="text" name="delemail" id="delemail" disabled>
<label for="delcredit">Credit Limit</label>
<input type="text" name="delcredit" id="delcredit" disabled>
    
    
<label for="delamountowed">Amount Owed</label>
<input type="text" name="delamountowed" id="delamountowed" disabled>
<label for="delblacklistflag">Blacklist Flag</label>
<input type="text" name="delblacklistflag" id="delblacklistflag" disabled>
<label for="delnumberblacklist">Number of Blacklist</label>
<input type="text" name="delnumberblacklist" id="delnumberblacklist" disabled>
<br><br>
<input type="submit" value="Delete the record">
</form>
</div>
<?php
// Display confirmation message if a company record has been deleted
if(isset($_SESSION["CompanyID"]))
{
    echo "<h1 class='myMessage'>Record deleted for "
    . $_SESSION["CompanyName"] . "</h1>";
}
session_destroy();
?>
</body>
            <script src="/Full_Website/resources/Test.js"></script>
</html>
