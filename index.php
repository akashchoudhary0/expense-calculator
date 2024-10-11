<?php

include 'partials/_dbconnect.php';
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Expense Tracker</title>
    <style>
        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen"> 
    <div class="flex w-full max-w-5xl bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Form Section -->
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Expense Calculator</h2>
            <form method="POST" action="/expense/index.php">
                <!-- Item Name -->
                <div class="mb-4">
                    <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name:</label>
                    <input type="text" id="item_name" name="item_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Amount -->
                <div class="mb-4">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                    <input type="number" id="amount" name="amount" step="0.01" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Date -->
                <div class="mb-4">
                    <label for="expense_date" class="block text-sm font-medium text-gray-700">Date:</label>
                    <input type="date" id="expense_date" name="expense_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Additional Notes -->
                <div class="mb-6">
                    <label for="discription" class="block text-sm font-medium text-gray-700">Additional Notes:</label>
                    <textarea id="discription" name="discription" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Add Expense</button>
                </div>
            </form>
            
            <?php if ($showAlert): ?>
                <div class="alert alert-info mt-4" role="alert">Record entered successfully</div>
            <?php endif; ?>

            <!-- Display Total Expense -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700">Total Expense: <span class="text-blue-600">₹<?= number_format($totalExpense, 2) ?></span></h3>
            </div>
        </div>
        <div class="w-1/2 p-8">
            <a href="index1.php"><button type="button" class="btn btn-primary">Middle</button></a>
        </div>

    </div>
</body>
</html>
