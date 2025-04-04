<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Averaging System</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS -->
</head>
<body>
    <div class="container">
        <h1>Grade Averaging System</h1>
        <form action="process.php" method="POST">
            <label for="q1">1st Quarter Grade:</label>
            <input type="number" name="q1" id="q1" required>

            <label for="q2">2nd Quarter Grade:</label>
            <input type="number" name="q2" id="q2" required>

            <label for="q3">3rd Quarter Grade:</label>
            <input type="number" name="q3" id="q3" required>

            <label for="q4">4th Quarter Grade:</label>
            <input type="number" name="q4" id="q4" required>

            <button type="submit">Calculate Average</button>
        </form>
    </div>
</body>
</html>