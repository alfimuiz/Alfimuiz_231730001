<?php
session_start();

// Fungsi untuk memproses checkout
function checkout() {
    // Cek apakah keranjang ada dalam sesi
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Simulasi proses pembayaran dan simpan detail pesanan
        $orderDetails = $_SESSION['cart']; // Ambil detail pesanan

        // Kosongkan keranjang setelah checkout
        $_SESSION['cart'] = [];

        // Simulasi pengiriman email atau penyimpanan ke database
        // Di sini kita hanya akan mengembalikan detail pesanan
        return $orderDetails;
    }
    return false; // Mengembalikan false jika keranjang kosong
}

// Proses checkout jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order = checkout();
    if ($order) {
        // Tampilkan detail pesanan
        echo "<h1>Checkout Berhasil!</h1>";
        echo "<h3>Detail Pesanan:</h3>";
        echo "<pre>" . print_r($order, true) . "</pre>";
    } else {
        echo "Keranjang kosong, tidak ada yang dapat dipesan.";
    }
} else {
    // Jika tidak ada POST, redirect ke keranjang
    header('Location: cart.php');
    exit;
}
?>