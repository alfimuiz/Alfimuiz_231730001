<?php 
include '../includes/db.php'; 
include '../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    header('Location: ../admin/index.php');
    exit;
}
?>