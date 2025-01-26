<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "wastemgmt";

$conn = mysqli_connect($server, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['street_name']) && isset($_POST['ward_no']) && isset($_POST['house_no']) && isset($_POST['waste_qty']) && isset($_POST['wasteType'])) {
        
        $street_name = mysqli_real_escape_string($conn, $_POST['street_name']);
        $ward_no = mysqli_real_escape_string($conn, $_POST['ward_no']);
        $house_no = mysqli_real_escape_string($conn, $_POST['house_no']);
        $waste_qty = mysqli_real_escape_string($conn, $_POST['waste_qty']);
        $waste_type = mysqli_real_escape_string($conn, $_POST['wasteType']);

        $sql = "INSERT INTO waste_req (street, ward, house_no, qty, waste_type) VALUES ('$street_name', '$ward_no', '$house_no', '$waste_qty', '$waste_type')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Waste reported successfully";
        } else {
            echo "Error: " . mysqli_error($conn); 
        }
    } else {
        echo "Please fill in all fields.";
    }
    header("Location: report.html");
    exit();
}
mysqli_close($conn);
?>
