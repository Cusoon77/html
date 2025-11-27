<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="number"] {
            padding: 8px;
            width: 250px;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f2f2f2;
            width: fit-content;
        }
    </style>
</head>
<body>

<h2>Electricity Bill Calculator</h2>

<form method="post">
    <label>Enter your name:</label><br>
    <input type="text" name="name" required><br>

    <label>Enter units used:</label><br>
    <input type="number" name="unit" required><br>

    <input type="submit" name="submit" value="Calculate Bill">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $unit = $_POST['unit'];

    if (empty($unit)) {
        echo "<script>alert('Unit is required');</script>";
    } else {
        // Bill Calculation Logic
        if ($unit <= 100) {
            $bill = $unit * 2.50;
        } elseif ($unit <= 200) {
            $bill = (100 * 2.50) + (($unit - 100) * 3.50);
        } else {
            $bill = (100 * 2.50) + (100 * 3.50) + (($unit - 200) * 5.00);
        }

        echo "<div class='result'>";
        echo "<strong>Name:</strong> $name<br>";
        echo "<strong>Units Used:</strong> $unit<br>";
        echo "<strong>Electricity Bill:</strong> $" . number_format($bill, 2);
        echo "</div>";
    }
}
?>

</body>
</html>

