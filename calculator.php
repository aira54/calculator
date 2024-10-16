<?php
if (isset($_POST['submit'])) {
    // Ambil nilai input dari form
    $firstNumber = $_POST['firstNumber'];
    $operator = $_POST['operator'];
    $secondNumber = $_POST['secondNumber'];
    
    // Variabel untuk menampung hasil
    $result = 0;
    
    // Logika perhitungan
    switch ($operator) {
        case '+':
            $result = $firstNumber + $secondNumber;
            break;
        case '-':
            $result = $firstNumber - $secondNumber;
            break;
        case '*':
            $result = $firstNumber * $secondNumber;
            break;
        case '/':
            if ($secondNumber != 0) {
                $result = $firstNumber / $secondNumber;
            } else {
                $result = 'Error: Division by zero';
            }
            break;
        default:
            $result = 'Invalid operator';
    }
    // Redirect ke halaman kalkulator dengan hasil
    header("Location: index.php?result=$result");
    exit();
}
?>
