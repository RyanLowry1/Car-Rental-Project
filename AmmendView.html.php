<!--Name : Ryan Lowry-->
<!--Student Number : C00305950-->
<!--Date : 05/02/2026-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/Full_Website/resources/Layout.css"> <!--Imports the external stylesheet-->
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Full_Website/resources/menu.php'; ?>    
<div class = "container">
<h2>Amend/View a Company</h2>
<h4>Please select a Company and then click the amend button if you wish to update</h4>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Full_Website/listboxes/Amend_Company_Listbox.php'; ?>
<script>
    
// Populate form fields data from listbox
function populate()
{
    var sel = document.getElementById("listbox");
    var result = sel.options[sel.selectedIndex].value;
    var companyDetails = result.split(',');
    document.getElementById("display").innerHTML =
        "The details of the selected company are: " + result;
    document.getElementById("companyid").value = companyDetails[0];
    document.getElementById("amendcompanyname").value = companyDetails[1];
    document.getElementById("amendaddress").value = companyDetails[2];
    document.getElementById("amendcreditlimit").value = companyDetails[3];
    document.getElementById("companyphonenumber").value = companyDetails[4];
    document.getElementById("companywebaddress").value = companyDetails[5];
    document.getElementById("companyemailaddress").value = companyDetails[6];
    
    document.getElementById("amountowed").value = companyDetails[7];
    document.getElementById("blacklistflag").value = companyDetails[8];
    document.getElementById("numberblacklist").value = companyDetails[9];
}
// Toggle form fields between editable and read-only
function toggleLock()
{
    var button = document.getElementById("amendViewbutton");
    if (button.value == "Amend Details")
    {
        document.getElementById("amendcompanyname").disabled = false;
        document.getElementById("amendaddress").disabled = false;
        document.getElementById("amendcreditlimit").disabled = false;
        document.getElementById("companyphonenumber").disabled = false;
        document.getElementById("companyemailaddress").disabled = false;
        document.getElementById("companywebaddress").disabled = false;
        
        document.getElementById("amountowed").disabled = true;
        document.getElementById("blacklistflag").disabled = true;
        document.getElementById("numberblacklist").disabled = true;
        button.value = "View Details";
    }
    else
    {
        document.getElementById("amendcompanyname").disabled = true;
        document.getElementById("amendaddress").disabled = true;
        document.getElementById("amendcreditlimit").disabled = true;
        document.getElementById("companyphonenumber").disabled = true;
        document.getElementById("companyemailaddress").disabled = true;
        document.getElementById("companywebaddress").disabled = true;
        
        document.getElementById("amountowed").disabled = true;
        document.getElementById("blacklistflag").disabled = true;
        document.getElementById("numberblacklist").disabled = true;
        button.value = "Amend Details";
    }
}
// Confirm before saving changes
function confirmCheck()
{
    var response = confirm('Are you sure you want to save these changes?');
    if (response)
    {
        document.getElementById("companyid").disabled = false;
        return true;
    }
    else
    {
        populate();
        toggleLock();
        return false;
    }
}
</script>
<!-- Form with ammend view details -->
<div class="form-container">
    <p id="display"></p>
    <input type="button"
           value="Amend Details"
           id="amendViewbutton"
           onclick="toggleLock()">
    <form name="myForm"
          action="AmendView.php"
          method="post"
          onsubmit="return confirmCheck()">
    <input type="hidden" id="companyid" name="companyid">
        
<div class="inputbox">
<label>Company Name:</label>
<input type="text" id="amendcompanyname" name="amendcompanyname"
pattern="[A-Za-z .]{1,50}" title="1-50 Characters Only" required disabled> <!-- Text input for company name (1–50 letters, spaces, or dots only), currently disabled -->
</div>
<div class="inputbox">
<label>Company Address:</label>
<input type="text" id="amendaddress" name="amendaddress"
pattern="[A-Za-z0-9 ,.\-]{1,100}" title="1-100 Characters Only" required disabled>
</div>
<div class="inputbox">
<label>Phone Number:</label>
<input type="text" id="companyphonenumber" name="companyphonenumber"
pattern="[0-9 ]{1,16}" title="1-15 Numbers Only" required disabled>
</div>
<div class="inputbox">
<label>Website Address:</label>
<input type="url" id="companywebaddress" name="companywebaddress"
pattern="https?://.+\.(com|ie)(/.*)?$" title="Only allows .com or .ie" required disabled>
</div>
<div class="inputbox">
<label>Email Address:</label>
<input type="email" id="companyemailaddress" name="companyemailaddress"
maxlength="50" title="Maximum 50 Characters" required disabled>
</div>
<div class="inputbox">
<label>Credit Limit:</label>
<input type="number" id="amendcreditlimit" name="amendcreditlimit"
value="1000" min="0" step="1" max="10000"
title="Credit Limit must be greater than or equal to 0 , less than 10000" required disabled>
</div>
        
<div class="inputbox">
<label>Amount Owed:</label>
<input type="number" id="amountowed" name="amountowed" min="0" step="1" max="10000" disabled>
</div>
        
<div class="inputbox">
<label>Blacklist Flag:</label>
<input type="number" id="blacklistflag" name="blacklistflag" min="0" step="1" max="10000" disabled>
</div>
        
<div class="inputbox">
<label>Number of times Blacklisted:</label>
<input type="number" id="numberblacklist" name="numberblacklist" min="0" step="1" max="10000" disabled> <br><br>
</div>
        <input type="submit" value="Save Changes">
    </form>
</div>
        <script src="/Full_Website/resources/Test.js"></script> <!-- Loads external JavaScript file -->
</body>
</html>
