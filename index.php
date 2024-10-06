<?php
$server ="localhost";
$username ="root";
$password ="";
$database ="expense";

//if($conn){
  //echo "success";
//}else{
  //  die("error ".mysql_connect_error());
//}

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

<body>


    <form method="POST" action="/expcalcutor/index.php">
        <div class="mb-3">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" required>
        </div>
        <div class="mb-3">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category">
        </div>
        <div class="mb-3">
            <label for="expense_date">Date:</label>
            <input type="date" id="expense_date" name="expense_date" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit">Add Expense</button>

    </form>



</body>

</html>