<?php

$showAlert = false; 
$server = "localhost";
$username = "root";
$password = "";
$database = "expense";

// Connect to the database
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $item_name = $_POST["item_name"];
    $amount = $_POST["amount"];
    $expense_date = $_POST["expense_date"];
    $discription = $_POST["discription"];

    $sql = "INSERT INTO `expense` (`item_name`, `amount`, `expense_date`, `discription`) VALUES ('$item_name', '$amount', '$expense_date', '$discription')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $showAlert = true;
    }
}

// Fetch stored data
$expenses = [];
$sql = "SELECT * FROM `expense`";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $expenses[] = $row;
    }
}

// Calculate total expenses
$totalExpense = 0;
foreach ($expenses as $expense) {
    $totalExpense += (float)$expense['amount'];
}

?>
