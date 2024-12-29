<?php
// Database connection
$showAlert = false; 
$server = "localhost";
$username = "root";
$password = "";
$database = "exp";

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

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `exp` (`item_name`, `amount`, `expense_date`, `discription`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $item_name, $amount, $expense_date, $discription);

    if ($stmt->execute()) {
        $showAlert = true;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch stored data
$expenses = [];
$sql = "SELECT * FROM `exp`";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $expenses[] = $row;
    }
}

// Calculate total expenses
$totalExpense = 0;
foreach ($expenses as $exp) {
    $totalExpense += (float)$exp['amount'];
}

?>