<?php

require_once('../admin/sidebar.php');
require_once('../admin/navbar.php');
require_once('../classes/pesanan.php');
require_once('../classes/produk.php');

$orders = new Pesanan();
$order = $orders->getAllOrderWithProduct();
$products = new Produk();
$product = $products->getAll();

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"></h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>List Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No.HP</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Jml</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Total</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($order as $data) {
                                    ?>
                                        <tr>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['nama_pemesan'] ?></td>
                                            <td><?= $data['alamat_pemesan'] ?></td>
                                            <td><?= $data['no_hp'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['jumlah_pesanan'] ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td><?= $data['deskripsi'] ?></td>
                                            <td><?= number_format($data['total_harga'], 0, ',', '.') ?></td>
                                            <td>
                                                <a href="orderEdit.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="../controllers/orderController.php?action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <a href="orderForm.php" class="btn btn-success mt-4">Input Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
</div>

<?php include_once('../admin/footer.php'); ?>