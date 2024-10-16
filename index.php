<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .calculator {
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .display {
            width: 100%;
            height: 50px;
            border: none;
            background-color: #f0f0f0;
            text-align: right;
            padding: 10px;
            font-size: 24px;
            box-sizing: border-box;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #e6e6e6;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:active {
            background-color: #ccc;
        }

        .equal {
            background-color: #4CAF50;
            color: white;
        }

        .equal:active {
            background-color: #45a049;
        }

        .clear {
            background-color: #f44336;
            color: white;
        }

        .clear:active {
            background-color: #e53935;
        }

        .operators {
            background-color: #ffcc00;
        }

        .operators:active {
            background-color: #ffb700;
        }
    </style>
</head>
<body>

<div class="calculator">
    <!-- Display -->
    <input type="text" class="display" id="display" value="<?php echo isset($_GET['result']) ? $_GET['result'] : '0'; ?>" readonly>

    <!-- Kalkulator Form -->
    <form method="POST" action="calculator.php">
        <div class="buttons">
            <button type="button" onclick="clearDisplay()">AC</button>
            <button type="button" onclick="appendOperator('/')">÷</button>
            <button type="button" onclick="appendOperator('*')">×</button>
            <button type="button" onclick="appendOperator('-')">−</button>

            <button type="button" onclick="appendNumber('7')">7</button>
            <button type="button" onclick="appendNumber('8')">8</button>
            <button type="button" onclick="appendNumber('9')">9</button>
            <button type="button" onclick="appendOperator('+')">+</button>

            <button type="button" onclick="appendNumber('4')">4</button>
            <button type="button" onclick="appendNumber('5')">5</button>
            <button type="button" onclick="appendNumber('6')">6</button>

            <button type="button" onclick="appendNumber('1')">1</button>
            <button type="button" onclick="appendNumber('2')">2</button>
            <button type="button" onclick="appendNumber('3')">3</button>

            <button type="button" onclick="appendNumber('0')">0</button>
            <button type="button" onclick="appendNumber('.')">.</button>
            <button type="submit" class="equal">=</button>
        </div>
    </form>
</div>

<!-- JavaScript -->
<script>
    let display = document.getElementById('display');
    let firstNumber = '';
    let operator = '';
    let secondNumber = '';

    // Function to append numbers to the display
    function appendNumber(number) {
        if (operator === '') {
            firstNumber += number;
            display.value = firstNumber;
        } else {
            secondNumber += number;
            display.value = secondNumber;
        }
    }

    // Function to append operator
    function appendOperator(op) {
        operator = op;
    }

    // Function to clear the display
    function clearDisplay() {
        display.value = '0';
        firstNumber = '';
        secondNumber = '';
        operator = '';
    }
</script>

</body>
</html>
