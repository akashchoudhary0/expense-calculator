<?php
include 'partials/_dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored Expenses</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-start justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-11/12 md:w-3/4 lg:w-1/2">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Stored Expenses</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 border-gray-200">Serial No</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200">Item Name</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200">Amount</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200">Date</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $serialNo = 1; // Initialize serial number
                    foreach ($expenses as $expense): ?>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200"><?= $serialNo++ ?></td> <!-- Display the serial number -->
                            <td class="py-2 px-4 border-b border-gray-200"><?= htmlspecialchars($expense['item_name']) ?></td>
                            <td class="py-2 px-4 border-b border-gray-200">₹<?= number_format($expense['amount'], 2) ?></td>
                            <td class="py-2 px-4 border-b border-gray-200"><?= htmlspecialchars($expense['expense_date']) ?></td>
                            <td class="py-2 px-4 border-b border-gray-200"><?= htmlspecialchars($expense['discription']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="flex justify-center mt-6">
            <a href="index.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                Add Expense
            </a>
        </div>
    </div>
</body>
</html>
