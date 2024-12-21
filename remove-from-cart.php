<?php
session_start();

// Cek apakah ada ID produk yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah keranjang ada dalam sesi
    if (isset($_SESSION['cart'][$id])) {
        // Hapus produk dari keranjang
        unset($_SESSION['cart'][$id]);
        header('Location: index.php'); // Redirect kembali ke halaman keranjang
        exit;
    } else {
        // Jika produk tidak ditemukan dalam keranjang
        header('Location: cart.php?error=Product not found in cart');
        exit;
    }
} else {
    // Jika tidak ada ID yang diterima
    header('Location: index.php?error=No product ID specified');
    exit;
}
?>