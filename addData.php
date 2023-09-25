<?php
include './config.php';

// Retrieve and sanitize the data from the POST array
$companySelect = mysqli_real_escape_string($con, $_POST['companySelect']);
$invoiceDate = mysqli_real_escape_string($con, $_POST['invoiceDate']);
$invoiceNumber = mysqli_real_escape_string($con, $_POST['invoiceNumber']);
$requestId = mysqli_real_escape_string($con, $_POST['requestId']);
$selectedCompanyAddress = mysqli_real_escape_string($con, $_POST['selectedCompanyAddressHidden']);
$bookedBy = mysqli_real_escape_string($con, $_POST['bookedBy']);
$passengerName = mysqli_real_escape_string($con, $_POST['passengerName']);
$fromD = mysqli_real_escape_string($con, $_POST['fromD']);
$toD = mysqli_real_escape_string($con, $_POST['toD']);
$car = mysqli_real_escape_string($con, $_POST['car']);
$Vno = mysqli_real_escape_string($con, $_POST['Vno']);
$selectedDuty = mysqli_real_escape_string($con, $_POST['selectedDuty']);
$dutyAmt = mysqli_real_escape_string($con, $_POST['dutyAmt']);
$extHrs = mysqli_real_escape_string($con, $_POST['extHrs']);
$myQty = mysqli_real_escape_string($con, $_POST['myQty']);
$extHAmt = mysqli_real_escape_string($con, $_POST['extHAmt']);
$exKm = mysqli_real_escape_string($con, $_POST['exKm']);
$extKms = mysqli_real_escape_string($con, $_POST['extKms']);
$extKAmt =  mysqli_real_escape_string($con, $_POST['extKAmt']);
$pnt = mysqli_real_escape_string($con, $_POST['pnt']);
$nightAllow = mysqli_real_escape_string($con, $_POST['nightAllow']);
$totalAmount = mysqli_real_escape_string($con, $_POST['totalAmount']);


$inWordsInput = mysqli_real_escape_string($con, $_POST['inWordsInput']);



$uploadDirectory = "uploads/"; // Specify the directory where you want to save the uploaded images

if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true); // Create the directory if it doesn't exist
}

$uploadedDutyFile = $_FILES["uploadDuty"];
$uploadedPatFile = $_FILES["uploadPaT"]; // Change this to match the input file name

$uploadDutyPath = $uploadDirectory . basename($uploadedDutyFile["name"]);
$uploadPatPath = $uploadDirectory . basename($uploadedPatFile["name"]);

// Move the uploaded files to the specified directory
if (move_uploaded_file($uploadedDutyFile["tmp_name"], $uploadDutyPath) &&
    move_uploaded_file($uploadedPatFile["tmp_name"], $uploadPatPath)) {

    // Create the SQL query for inserting into the database with file paths
    $insertData = "INSERT INTO invoice_form (companySelect, invoiceDate, invoiceNumber, requestId, selectedCompanyAddress, bookedBy, passengerName, fromD, toD, car, Vno, selectedDuty, uploadDuty, dutyAmt,  extHrs, myQty, extHAmt, exKm, extKms, extKAmt,uploadPaT ,pnt, nightAllow, totalAmount,inWordsInput) VALUES ('$companySelect','$invoiceDate','$invoiceNumber','$requestId','$selectedCompanyAddress','$bookedBy','$passengerName','$fromD','$toD','$car','$Vno','$selectedDuty','$uploadDutyPath','$dutyAmt','$extHrs','$myQty','$extHAmt','$exKm','$extKms','$extKAmt','$uploadPatPath','$pnt','$nightAllow','$totalAmount','$inWordsInput')";

    // Execute the query and handle errors
    if ($con->query($insertData) === TRUE) {
        // Insertion successful
        echo "Data inserted successfully!";
    } else {
        // Insertion failed, print the error message
        echo "Error: " . $insertData . "<br>" . $con->error;
    }
    header ('location: ./index.php?success=true');
} else {
    // File upload failed
    echo "File upload failed.";
}

// Close the database connection
$con->close();
?>
