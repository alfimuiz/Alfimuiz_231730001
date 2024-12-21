<?php 
include '../includes/db.php'; 
include '../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $product = $stmt->fetch();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $brand_id = $_POST['brand_id']; // Ambil brand_id dari form

    $query = "UPDATE products SET name = ?, description = ?, price = ?, image = ?, brand_id = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $description, $price , $image, $brand_id, $id]);

    move_uploaded_file($tmp_image, "../assets/images/$image");

    header('Location: index.php');
    exit;
}

// Ambil data brand dari database
$query = "SELECT * FROM brands";
$stmt = $pdo->prepare($query);
$stmt->execute();
$brands = $stmt->fetchAll();
?>

<div class="container mt-5">
    <h1>Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required><?php echo $product['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <select class="form-control" id="brand" name="brand_id" required>
                <?php foreach ($brands as $brand): ?>
                    <option value="<?php echo $brand['id']; ?>" <?php echo ($product['brand_id'] == $brand['id']) ? 'selected' : ''; ?>>
                        <?php echo $brand['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Edit Product</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>