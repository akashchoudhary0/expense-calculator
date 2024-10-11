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
    <title>Document</title>
</head>
<body>
    <!-- Table Section -->
    <div class="w-1/2 bg-gray-50 p-6">
            <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Stored Expenses</h2>
            <div class="table-container">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Serial no</th>
                            <th class="py-2 px-4 border-b text-left">Item Name</th>
                            <th class="py-2 px-4 border-b text-left">Amount</th>
                            <th class="py-2 px-4 border-b text-left">Date</th>
                            <th class="py-2 px-4 border-b text-left">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($expenses as $expense): ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?= htmlspecialchars($expense['sno']) ?></td>
                                <td class="py-2 px-4 border-b"><?= htmlspecialchars($expense['item_name']) ?></td>
                                <td class="py-2 px-4 border-b">₹<?= number_format($expense['amount'], 2) ?></td>
                                <td class="py-2 px-4 border-b"><?= htmlspecialchars($expense['expense_date']) ?></td>
                                <td class="py-2 px-4 border-b"><?= htmlspecialchars($expense['discription']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>