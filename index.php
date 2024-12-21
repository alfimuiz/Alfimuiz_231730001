<?php 
include '../includes/db.php'; 
include '../includes/header.php'; 

// Cek apakah ada brand_id yang diterima dari URL
$brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : '';

// Query untuk mengambil produk berdasarkan brand
if ($brand_id) {
    $query = "SELECT * FROM products WHERE brand_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$brand_id]);
} else {
    $query = "SELECT * FROM products"; 
    $stmt = $pdo->prepare($query); 
    $stmt->execute(); 
}

$products = $stmt->fetchAll(); 
?>

<div class="container mt-5">
    <h1>Our Products</h1>
    <div class="row">
        <?php if (count($products) > 0): ?>
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
        <?php else: ?>
            <div class="col-12">
                <p>Tidak ada produk yang ditemukan untuk brand ini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>