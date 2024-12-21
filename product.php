<?php 
include '../includes/db.php'; 
include '../includes/header.php'; 

$query = "SELECT * FROM products"; 
$stmt = $pdo->prepare($query); 
$stmt->execute(); 
$products = $stmt->fetchAll(); 
?>

<div class="container mt-5">
    <h1>Our Products</h1>
    <div class="row">
    <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card mb-4 product-box">
                    <img src="../assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <p class="card-text">Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
                        <a href="../cart/add-to-cart.php?id=<?php echo $product['id']; ?>" class="btn btn-success">Tambah ke Keranjang</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>