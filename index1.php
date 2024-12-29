<?php

// Include database connection
include 'partials/_dbconnect.php';



// Initialize variables
$expenses = [];
$totalExpense = 0;
$selectedMonth = date('m'); // Default to the current month
$selectedYear = date('Y'); // Default to the current year

// Check if filter form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['month']) && isset($_GET['year'])) {
    $selectedMonth = $_GET['month'];
    $selectedYear = $_GET['year'];
}

// Fetch filtered expenses
$sql = "SELECT * FROM `exp` WHERE MONTH(`expense_date`) = ? AND YEAR(`expense_date`) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $selectedMonth, $selectedYear);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $expenses[] = $row;
        $totalExpense += (float)$row['amount'];
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored Expenses</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center ">

      <!-- Filter Form -->
    <div class="w-3/4 p-4 bg-white rounded-lg shadow-md mb-4">
        <form method="GET" class="flex flex-row items-center justify-between">
            <div>
                <label for="month" class="text-sm font-medium text-gray-700">Month:</label>
                <select id="month" name="month" class="p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <?php for ($m = 1; $m <= 12; $m++): ?>
                        <option value="<?= $m ?>" <?= $m == $selectedMonth ? 'selected' : '' ?>>
                            <?= date('F', mktime(0, 0, 0, $m, 1)) ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <label for="year" class="text-sm font-medium text-gray-700">Year:</label>
                <input type="number" id="year" name="year" value="<?= $selectedYear ?>" class="p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" min="2000" max="<?= date('Y') ?>">
            </div>
            <div>
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">
                    view
                </button>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="w-3/4 p-8 bg-white rounded-lg shadow-md">
        <div class="flex flex-row justify-between">
            <h2 class="text-2xl font-bold text-blue-600 mb-4 text-center">Stored Expenses</h2>
            <!-- Display Total Expense -->
            <div class="mt-6 text-center pb-4 text-2xl font-bold">
                <h3 class="text-lg font-semibold text-gray-700">Total Expense: <span class="text-blue-600">₹
                        <?= number_format($totalExpense, 2) ?>
                    </span></h3>
            </div>
        </div>
        <div class="table-container">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="border border-gray-200 px-4 py-2 text-left">Serial no.</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Item Name</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Amount</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Date</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($expenses as $exp): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-200 px-4 py-2">
                            <?= number_format($exp['sno']) ?>
                        </td>
                        <td class="border border-gray-200 px-4 py-2">
                            <?= htmlspecialchars($exp['item_name']) ?>
                        </td>
                        <td class="border border-gray-200 px-4 py-2">₹
                            <?= number_format((float)$exp['amount'], 2) ?>
                        </td>
                        <td class="border border-gray-200 px-4 py-2">
                            <?= htmlspecialchars($exp['expense_date']) ?>
                        </td>
                        <td class="border border-gray-200 px-4 py-2">
                            <?= htmlspecialchars($exp['discription']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>