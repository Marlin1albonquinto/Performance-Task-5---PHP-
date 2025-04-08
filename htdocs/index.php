<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #e91e63;
        }

        #form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="number"] {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: border-color 0.3s;
        }

        input[type="number"]:focus {
            border-color: #e91e63;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #e91e63; 
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #d81b60;
        }

        #result {
            background-color: #fce4ec;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        #result h2 {
            margin-top: 0;
            color: #e91e63;
        }

        #result p {
            margin-bottom: 5px;
            color: #333;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="container">
    <div id="form">
        <form method="post" action="">
            <h2>Grade Calculator</h2>
            <label for="q1">1st Quarter Grade:</label>
            <input type="number" name="q1" id="q1" min="0" max="100" required><br>
            <label for="q2">2nd Quarter Grade:</label>
            <input type="number" name="q2" id="q2" min="0" max="100" required><br>
            <label for="q3">3rd Quarter Grade:</label>
            <input type="number" name="q3" id="q3" min="0" max="100" required><br>
            <label for="q4">4th Quarter Grade:</label>
            <input type="number" name="q4" id="q4" min="0" max="100" required><br>
            <input type="submit" value="Calculate">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];

        $average = ($q1 + $q2 + $q3 + $q4) / 4;

        $grade_descriptor = '';
        $remarks = '';

        if ($average >= 90) {
            $grade_descriptor = 'OUTSTANDING';
            $remarks = 'PASSED';
        } elseif ($average >= 85) {
            $grade_descriptor = 'VERY SATISFACTORY';
            $remarks = 'PASSED';
        } elseif ($average >= 80) {
            $grade_descriptor = 'SATISFACTORY';
            $remarks = 'PASSED';
        } elseif ($average >= 75) {
            $grade_descriptor = 'FAIRLY SATISFACTORY';
            $remarks = 'PASSED';
        } else {
            $grade_descriptor = 'DID NOT MEET EXPECTATIONS';
            $remarks = 'FAILED';
        }

        echo '<div id="result">';
        echo '<h2>Result</h2>';
        echo '<p>Average Grade: ' . $average . '</p>';
        echo '<p>Grade Descriptor: ' . $grade_descriptor . '</p>';
        echo '<p>Remarks: ' . $remarks . '</p>';
        echo '</div>';
    }
    ?>
</div>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Grade Calculation Result</h2>
        <p id="modal-average"></p>
        <p id="modal-descriptor"></p>
        <p id="modal-remarks"></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const resultDiv = document.getElementById('result');
        if (resultDiv) {
            const modal = document.getElementById('myModal');
            const span = document.getElementsByClassName('close')[0];

            modal.style.display = 'block';

            document.getElementById('modal-average').innerText = resultDiv.querySelector('p:nth-child(2)').innerText;
            document.getElementById('modal-descriptor').innerText = resultDiv.querySelector('p:nth-child(3)').innerText;
            document.getElementById('modal-remarks').innerText = resultDiv.querySelector('p:nth-child(4)').innerText;

            span.onclick = function() {
                modal.style.display = 'none';
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        }
    });
</script>
</body>
</html>