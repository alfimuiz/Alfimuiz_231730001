<?php 
include '../includes/db.php'; 
include '../includes/header.php'; 

$query = "SELECT * FROM brands"; 
$stmt = $pdo->prepare($query); 
$stmt->execute(); 
$brands = $stmt->fetchAll(); 
?>

<div class="container mt-5">
    <h1>Our Products</h1>
    <div class="row">
        <?php foreach ($brands as $brand): ?>
            <div class="col-md-4">
                <div class="card mb-4 product-box">
                    <img src="../assets/logos/<?php echo $brand['logo']; ?>" alt="<?php echo $brand['name']; ?>" class="product-image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $brand['name']; ?></h5>
                
                        <a href="index.php?brand_id=<?php echo $brand['id']; ?>" class="btn btn-success">Lihat Produk</a>
                    </div>
                </div>
            </div> 
        <?php endforeach; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>