<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="apple-calculator.png" href="apple-calculator.png">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 50px;
        }
        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 48%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        button[type="reset"] {
            background-color: #f44336; /* Warna untuk tombol reset */
        }
        button:hover {
            background-color: #45a049;
        }
        button[type="reset"]:hover {
            background-color: #e53935;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Kalkulator Sederhana</h2>
        <form method="POST" action="">
            <label>Angka Pertama:</label>
            <input type="number" name="angka1" required placeholder="Masukkan angka pertama">

            <label>Angka Kedua:</label>
            <input type="number" name="angka2" required placeholder="Masukkan angka kedua">

            <label>Operasi:</label>
            <select name="operasi" required>
                <option value="tambah">Penjumlahan (+)</option>
                <option value="kurang">Pengurangan (-)</option>
                <option value="kali">Perkalian (×)</option>
                <option value="bagi">Pembagian (÷)</option>
            </select>

            <!-- Tombol Hitung dan Reset -->
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" name="hitung">Hitung</button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <!-- Bagian PHP untuk Menghitung -->
        <div class="result">
            <?php
            if (isset($_POST['hitung'])) {
                $angka1 = $_POST['angka1'];
                $angka2 = $_POST['angka2'];
                $operasi = $_POST['operasi'];

                if ($operasi == "tambah") {
                    $hasil = $angka1 + $angka2;
                    echo "<p>Hasil: $angka1 + $angka2 = $hasil</p>";
                } elseif ($operasi == "kurang") {
                    $hasil = $angka1 - $angka2;
                    echo "<p>Hasil: $angka1 - $angka2 = $hasil</p>";
                } elseif ($operasi == "kali") {
                    $hasil = $angka1 * $angka2;
                    echo "<p>Hasil: $angka1 × $angka2 = $hasil</p>";
                } elseif ($operasi == "bagi") {
                    if ($angka2 != 0) {
                        $hasil = $angka1 / $angka2;
                        echo "<p>Hasil: $angka1 ÷ $angka2 = $hasil</p>";
                    } else {
                        echo "<p>Pembagian dengan nol tidak diizinkan!</p>";
                    }
                }
            }
            ?>
        </div>
    </div>

</body>
</html>
