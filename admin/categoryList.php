<?php

require_once('../admin/sidebar.php');
require_once('../admin/navbar.php');
require_once('../classes/kategori_produk.php');

$kategori_produk = new KategoriProduk();
$datas = $kategori_produk->getAll();

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"></h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>List Kategori Produk</h5>
                        </div>
                        <div class="card-body">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($datas as $data) {
                                    ?>
                                        <tr>
                                            <td><?= $data['id'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td>
                                                <a href="categoryEdit.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="../controllers/categoryController.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <a href="categoryForm.php" class="btn btn-success mt-4">Input Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
</div>

<?php include_once('../admin/footer.php'); ?>