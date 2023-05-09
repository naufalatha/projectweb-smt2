<?php
require_once('header.php');

require_once('classes/kategori_produk.php');
require_once('classes/produk.php');

$produk = new Produk();
$kategori_produk = new KategoriProduk();

$products = $produk->getAll();
$categories = $kategori_produk->getAll();

?>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><b>IBOX</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($categories as $category) : ?>
                <li><a class="dropdown-item" href="#"><?= $category['nama'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
        <div class="d-flex">
          <a class="nav-link" aria-current="page" href="admin/index.php" style="color:white">Admin</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h1>Etalase Produk</h1>
    <hr />
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-md-3">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title"><?= $product['nama'] ?></h5>
              <p class="card-text"><?= $product['deskripsi'] ?></p>
              <p class="card-text">
                <small class="text-muted">Rp. <?= number_format($product['harga_jual'], 0, ',', '.') ?></small>
              </p>
              <a href="buyerOrder.php?id=<?= $product['id'] ?>" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>