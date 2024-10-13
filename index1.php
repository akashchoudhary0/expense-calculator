<?php
include 'partials/_dbconnect.php';

// Fetch stored data
$expenses = [];
$sql = "SELECT * FROM `expense`";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $expenses[] = $row;
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
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-11/12 md:w-3/4 lg:w-1/2">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Stored Expenses</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Serial no</th>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Item Name</th>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Amount</th>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Date</th>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($expenses as $expense): ?>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200"><?= htmlspecialchars($expense['sno']) ?></td>
                        <td class="py-2 px-4 border-b border-gray-200"><?= htmlspecialchars($expense['item_name']) ?></td>
                        <td class="py-2 px-4 border-b border-gray-200">₹<?= number_format($expense['amount'], 2) ?></td>
                        <td class="py-2 px-4 border-b border-gray-200"><?= htmlspecialchars($expense['expense_date']) ?></td>
                        <td class="py-2 px-4 border-b border-gray-200"><?= htmlspecialchars($expense['discription']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
