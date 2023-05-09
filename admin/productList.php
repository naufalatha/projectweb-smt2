<?php

require_once('../admin/sidebar.php');
require_once('../admin/navbar.php');
require_once('../classes/produk.php');

$produk = new Produk();
$datas = $produk->getAll();

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"></h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>List Produk</h5>
                        </div>
                        <div class="card-body">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($datas as $data) {
                                    ?>
                                        <tr>
                                            <td><?= $data['kode'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['harga_jual'] ?></td>
                                            <td><?= $data['stok'] ?></td>
                                            <td>
                                                <a href="productEdit.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="../controllers/productController.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <a href="productForm.php" class="btn btn-success mt-4">Input Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
</div>

<?php include_once('../admin/footer.php'); ?>