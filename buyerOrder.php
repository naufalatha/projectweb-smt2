<?php
require_once('header.php');
require_once('classes/produk.php');

$product_id = $_GET['id'];
$products = new Produk();
$products = $products->getById($product_id);

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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
        <h1>Form Pesanan</h1>
        <hr />
        <div class="card">
            <div class="card-header">
                <h5>Tgl Pesanan : <?= date('Y-m-d') ?></h5>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <form method="POST" action="../controllers/orderController.php?action=createBuyer">
                            <div class="col-md-12 mt-4">
                                <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" hidden>
                                <div class="form-group row mb-3">
                                    <label for="nama_pemesan" class="col-4 col-form-label">Nama Pemesan</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="nama_pemesan" name="nama_pemesan" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="alamat_pemesan" class="col-4 col-form-label">Alamat</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <textarea id="alamat_pemesan" name="alamat_pemesan" type="text" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="no_hp" class="col-4 col-form-label">No HP</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="no_hp" name="no_hp" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="email" name="email" type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- min stok -->
                                <div class="form-group row mb-3">
                                    <label for="jumlah_pesanan" class="col-4 col-form-label">Jumlah Pesanan</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="jumlah_pesanan" name="jumlah_pesanan" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="produk_id" class="col-4 col-form-label">Pilih Produk</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <select name="produk_id" id="produk_id" class="form-control">
                                                <!-- option disabled default by id -->
                                                <option value="<?php echo $products['id']; ?>" selected><?php echo $products['nama']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>