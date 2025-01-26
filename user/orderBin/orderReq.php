<?php 
$server = "localhost";
$username = "root";
$password = "";

$dbname = "wastemgmt";

$conn = mysqli_connect($server, $username, $password, $dbname);

if($_SERVER["REQUEST_METHOD"]==="POST") {
$street_name = htmlspecialchars($_POST['street_name']);
$ward_no = htmlspecialchars($_POST['ward_no']);
$house_no = htmlspecialchars($_POST['house_no']);

$sql = "INSERT INTO bin_req (street, ward, house_no) VALUES ('$street_name', '$ward_no', '$house_no')";

$result = mysqli_query($conn, $sql);

if($result){
    echo "Bin requested  successfully";
}
else{
    echo "Bin request failed";
}}

header("Location: order.html");
?>

