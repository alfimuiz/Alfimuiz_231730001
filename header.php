<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Business Profile</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Rumah Sepatu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex ms-auto" role="search" action="../includes/search.php" method="GET">
                <input class="form-control me-2" type="text" name="search" placeholder="Search products..." aria-label="Search" required>
                <button class="btn btn-danger" type="submit">Search</button>
            </form>

                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="../products/brand.php">Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../products/product.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/index.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/login.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart/index.php">Lihat Keranjang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="hero">
        <div class="container text-center">
            <h1 class="display-4">Welcome to Our Store</h1>
            <p class="lead">Find the best products for your needs.</p>
        </div>
    </header>