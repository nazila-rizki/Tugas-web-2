<html>
<head>
    <title>Menghitung Diskon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, rgba(0, 255, 0, 0.5), rgba(0, 255, 255, 0.5)), url('https://placehold.co/1920x1080');
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    
    <div class="text-center text-white">
        <h2 class="text-4xl font-bold mb-8">Menghitung Diskon</h2>
        <div class="flex justify-center mb-8">
            <form method="POST">
                <label font-weight:bold, for="member">Status Member</label>
                <select name="member" id="member" class="ml-2 p-2 rounded">
            <?php
            $isMember = true; // Ganti sesuai kondisi yang Anda miliki, misalnya dari $_SESSION['member']
            ?>
                    <option value="yes" <?php if ($isMember) echo 'selected'; ?>>Ya</option>
                    <option value="no" <?php if (!$isMember) echo 'selected'; ?>>Tidak</option>
                </select>
        </div>
        <div class="flex justify-center mb-8">
            <input type="number" name="harga" placeholder="Masukan harga belanja" class="p-2 rounded-l-lg text-gray-700" required>
            <input type="number" name="diskon" placeholder="Masukan Diskon tanpa %" class="p-2 text-gray-700" required>
            <button type="submit" name="submit" class="bg-black text-white p-2 rounded-r-lg">Hitung</button>
        </div>
        <div class="bg-white bg-opacity-20 p-4 rounded-lg inline-block text-gray-700">
            <?php
            if (isset($_POST['submit'])) {
                $isMember = $_POST['member'] === 'yes';
                $totalBelanja = floatval($_POST['harga']);
                $tambahanDiskon = floatval($_POST['diskon']);
                $diskon = 0;

                if ($isMember) {
                    // Logika untuk member
                    if ($totalBelanja > 1000000) {
                        $diskon = 15; // 15% diskon jika belanja lebih dari 1.000.000
                    } elseif ($totalBelanja > 500000) {
                        $diskon = 10; // 10% diskon jika belanja lebih dari 500.000
                    } else {
                        $diskon = 10; // Potongan khusus member (10%) jika kurang dari 500.000
                    }
                } else {
                    // Logika untuk non-member
                    if ($totalBelanja > 1000000) {
                        $diskon = 10; // 10% diskon jika belanja lebih dari 1.000.000
                    } elseif ($totalBelanja > 500000) {
                        $diskon = 5; // 5% diskon jika belanja lebih dari 500.000
                    } else {
                        $diskon = 0; // Tidak ada diskon jika belanja kurang dari 500.000
                    }
                }

                // Tambahkan diskon dari input user
                $diskon = $diskon + $tambahanDiskon;

                // Hitung total setelah diskon
                $potongan = ($diskon / 100) * $totalBelanja;
                $totalSetelahDiskon = $totalBelanja - $potongan;

                // Output hasil
                echo "<p class='mb-2'>Harga Barang: Rp " . number_format($totalBelanja, 0, ',', '.') . "</p>";
                echo "<p class='mb-2'>Diskon: " . $diskon . "%</p>";
                echo "<p class='mb-2'>Diskon Tambahan: " . $tambahanDiskon . "%</p>";
                echo "<p>Harga Akhir: Rp " . number_format($totalSetelahDiskon, 0, ',', '.') . "</p>";
            }
            ?>
        </div>
        </form>
    </div>
</body>
</html>