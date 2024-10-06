<?php
$server ="localhost";
$username ="root";
$password ="";
$database ="expense";

$conn = mysqli_connect($server, $username, $password ,$database);
//$sql = "INSERT INTO `expense` (`item_name`, `amount`, `expense_date`, `discription`) VALUES ('$item_name', '$amount', '$expense_date', '$discription')";


if(!$conn){
 // echo "success";
// }else{
    die("error ".mysql_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;

    if (($password == $cpassword) && $exists == false) {
        $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;  
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="flex items-center justify-center min-h-screen ">

<div class="w-full max-w-lg bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Expense Calculator</h2>
        <form method="POST" action="/expcalculator/index.php">
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
                <input type="date" id="expense_date" name="expense_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
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

</body>

</html>
