<?php
require_once('../admin/sidebar.php');
require_once('../admin/navbar.php');
require_once('../classes/kategori_produk.php');

$cat_id = $_GET['id'];
$kategori_produk = new KategoriProduk();
$data = $kategori_produk->getById($cat_id);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"></h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Kategori</h5>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <form method="POST" action="../controllers/categoryController.php?action=update">
                                            <div class="form-group row">
                                                <label for="kode" class="col-4 col-form-label">Nama Kategori</label>
                                                <div class="col-8">
                                                    <div class="input-group">
                                                        <input id="nama" name="nama" type="text" class="form-control" value="<?= $data['nama'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-4 col-8">
                                                    <input name="cat_id" type="hidden" value="<?= $cat_id ?>">
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
            </div>
    </main>
    <?php include_once('../admin/footer.php'); ?>