<?php
session_start();
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data produk
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if ($product) {
        // Tambahkan produk ke keranjang
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][$id] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1,
            'image' => $product['image']
        ];
    }
    header('Location: index.php'); // Redirect ke halaman utama
    exit;
}
?>