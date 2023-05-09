<?php
include_once('../classes/database.php');
include_once('../classes/kategori_produk.php');

$kategori_produk = new KategoriProduk();

$action = $_GET['action'];

if ($action == 'create') {
    $nama = $_POST['nama'];

    $result = $kategori_produk->create($nama);
} else if ($action == 'update') {
    $id = $_POST['cat_id'];
    $nama = $_POST['nama'];

    $result = $kategori_produk->update($id, $nama);
} else if ($action == 'delete') {
    $id = $_GET['id'];

    $result = $kategori_produk->delete($id);
}

if ($result) {
    header('Location: ../admin/categoryList.php');
} else {
    echo "Gagal";
}
