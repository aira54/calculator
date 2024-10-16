<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="apple-calculator.png" href="apple-calculator.png">
    <title>Kalkulator Saintifik</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
            margin: 0;
        }

        .calculator {
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .display {
            width: 100%;
            height: 50px;
            border: none;
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            font-size: 24px;
            box-sizing: border-box;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
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

        .functions {
            background-color: #d3d3d3;
        }

        .operators {
            background-color: #ffcc00;
        }
    </style>
</head>
<body>

<div class="calculator">
    <input type="text" class="display" id="display" readonly value="0">

    <div class="buttons">
        <button class="functions" onclick="toggleRadDeg()">Rad</button>
        <button class="functions">Deg</button>
        <button class="functions">x!</button>
        <button class="functions">(</button>
        <button class="functions">)</button>
        <button class="clear" onclick="clearDisplay()">AC</button>

        <button class="functions">Inv</button>
        <button class="functions" onclick="trigOperation('sin')">sin</button>
        <button class="functions">ln</button>
        <button onclick="appendNumber('7')">7</button>
        <button onclick="appendNumber('8')">8</button>
        <button onclick="appendNumber('9')">9</button>

        <button class="functions" onclick="appendConstant('π')">π</button>
        <button class="functions" onclick="trigOperation('cos')">cos</button>
        <button class="functions">log</button>
        <button onclick="appendNumber('4')">4</button>
        <button onclick="appendNumber('5')">5</button>
        <button onclick="appendNumber('6')">6</button>

        <button class="functions" onclick="appendConstant('e')">e</button>
        <button class="functions" onclick="trigOperation('tan')">tan</button>
        <button class="functions">√</button>
        <button onclick="appendNumber('1')">1</button>
        <button onclick="appendNumber('2')">2</button>
        <button onclick="appendNumber('3')">3</button>

        <button class="operators" onclick="appendOperator('+')">+</button>
        <button class="operators" onclick="appendOperator('-')">-</button>
        <button class="operators" onclick="appendOperator('*')">×</button>
        <button class="operators" onclick="appendOperator('/')">÷</button>
        <button onclick="appendNumber('0')">0</button>
        <button onclick="appendNumber('.')">.</button>
        <button class="equal" onclick="calculate()">=</button>
    </div>
</div>

<script>
    let display = document.getElementById('display');
    let currentInput = '';
    let operator = '';
    let isRadians = true;

    function appendNumber(number) {
        if (display.value === '0') {
            display.value = number;
        } else {
            display.value += number;
        }
    }

    function appendOperator(op) {
        currentInput = display.value;
        operator = op;
        display.value = '';
    }

    function clearDisplay() {
        display.value = '0';
        currentInput = '';
        operator = '';
    }

    function calculate() {
        let result;
        switch (operator) {
            case '+':
                result = parseFloat(currentInput) + parseFloat(display.value);
                break;
            case '-':
                result = parseFloat(currentInput) - parseFloat(display.value);
                break;
            case '*':
                result = parseFloat(currentInput) * parseFloat(display.value);
                break;
            case '/':
                result = parseFloat(currentInput) / parseFloat(display.value);
                break;
            default:
                return;
        }
        display.value = result;
    }

    function toggleRadDeg() {
        isRadians = !isRadians;
        document.querySelector('.functions').textContent = isRadians ? 'Rad' : 'Deg';
    }

    function trigOperation(operation) {
        let value = parseFloat(display.value);
        if (!isRadians) {
            value = value * (Math.PI / 180);
        }
        let result;
        switch (operation) {
            case 'sin':
                result = Math.sin(value);
                break;
            case 'cos':
                result = Math.cos(value);
                break;
            case 'tan':
                result = Math.tan(value);
                break;
            default:
                return;
        }
        display.value = result;
    }

    function appendConstant(constant) {
        if (constant === 'π') {
            display.value = Math.PI;
        } else if (constant === 'e') {
            display.value = Math.E;
        }
    }
</script>

</body>
</html>
