<?php
require_once('../admin/sidebar.php');
require_once('../admin/navbar.php');
require_once('../classes/produk.php');
require_once('../classes/pesanan.php');

$order_id = $_GET['id'];
$products = new Produk();
$products = $products->getAll();
$orders = new Pesanan();
$order = $orders->getById($order_id);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"></h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <form method="POST" action="../controllers/orderController.php?action=update">
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group row">
                                                <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?= $order['tanggal'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama_pemesan" class="col-4 col-form-label">Nama Pemesan</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="nama_pemesan" name="nama_pemesan" type="text" class="form-control" value="<?= $order['nama_pemesan'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat_pemesan" class="col-4 col-form-label">Alamat</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <textarea id="alamat_pemesan" name="alamat_pemesan" type="text" class="form-control"><?= $order['alamat_pemesan'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no_hp" class="col-4 col-form-label">No HP</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="no_hp" name="no_hp" type="number" class="form-control" value="<?= $order['no_hp'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-4 col-form-label">Email</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="email" name="email" type="email" class="form-control" value="<?= $order['email'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- min stok -->
                                            <div class="form-group row">
                                                <label for="jumlah_pesanan" class="col-4 col-form-label">Jumlah Pesanan</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="jumlah_pesanan" name="jumlah_pesanan" type="number" class="form-control" value="<?= $order['jumlah_pesanan'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jumlah_pesanan" class="col-4 col-form-label">Pilih Produk</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <select id="produk_id" name="produk_id" class="custom-select">
                                                            <?php foreach ($products as $product) : ?>
                                                                <option value="<?= $product['id'] ?>" <?= $product['id'] == $order['produk_id'] ? 'selected' : '' ?>><?= $product['nama'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control"><?= $order['deskripsi'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <input type="hidden" name="pesanan_id" value="<?= $order['id'] ?>">
                                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <?php include_once('../admin/footer.php'); ?>