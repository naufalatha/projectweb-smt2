<?php
require_once('../admin/sidebar.php');
require_once('../admin/navbar.php');
require_once('../classes/produk.php');

$products = new Produk();
$products = $products->getAll();

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"></h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Input Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <form method="POST" action="../controllers/orderController.php?action=create">
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group row">
                                                <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="tanggal" name="tanggal" type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama_pemesan" class="col-4 col-form-label">Nama Pemesan</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="nama_pemesan" name="nama_pemesan" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat_pemesan" class="col-4 col-form-label">Alamat</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <textarea id="alamat_pemesan" name="alamat_pemesan" type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no_hp" class="col-4 col-form-label">No HP</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="no_hp" name="no_hp" type="number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-4 col-form-label">Email</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="email" name="email" type="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- min stok -->
                                            <div class="form-group row">
                                                <label for="jumlah_pesanan" class="col-4 col-form-label">Jumlah Pesanan</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="jumlah_pesanan" name="jumlah_pesanan" type="number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jumlah_pesanan" class="col-4 col-form-label">Pilih Produk</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <select id="produk_id" name="produk_id" class="custom-select">
                                                            <option value="">Pilih Produk</option>
                                                            <?php foreach ($products as $data) : ?>
                                                                <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
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