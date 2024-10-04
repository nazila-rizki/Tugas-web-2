<?php
function hitungDiskon($isMember, $totalBelanja) {
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

    // Hitung total setelah diskon
    $potongan = ($diskon / 100) * $totalBelanja;
    $totalSetelahDiskon = $totalBelanja - $potongan;

    return $totalSetelahDiskon;
}

// Input dari pengguna (misalnya)
$isMember = false; // Ganti dengan false jika bukan member
$totalBelanja = 1200000; // Total belanja

// Hitung total setelah diskon
$totalSetelahDiskon = hitungDiskon($isMember, $totalBelanja);

// Output hasil
echo "Total belanja setelah diskon: Rp " . number_format($totalSetelahDiskon, 0, ',', '.') . "\n";
?>