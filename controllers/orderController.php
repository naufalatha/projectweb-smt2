<?php
include_once('../classes/database.php');
include_once('../classes/pesanan.php');

$pesanan = new Pesanan();

$action = $_GET['action'];

if ($action == 'create') {
    $tanggal = $_POST['tanggal'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat_pemesan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jml_pesanan = $_POST['jumlah_pesanan'];
    $deskripsi = $_POST['deskripsi'];
    $produk_id = $_POST['produk_id'];

    $result = $pesanan->create($tanggal, $nama_pemesan, $alamat, $no_hp, $email, $jml_pesanan, $deskripsi, $produk_id);
    if ($result) {
        header('Location: ../admin/orderList.php');
    } else {
        echo "Gagal";
    }
} else if ($action == 'update') {
    $id = $_POST['pesanan_id'];
    $tanggal = $_POST['tanggal'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat_pemesan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jml_pesanan = $_POST['jumlah_pesanan'];
    $deskripsi = $_POST['deskripsi'];
    $produk_id = $_POST['produk_id'];

    $result = $pesanan->update($id, $tanggal, $nama_pemesan, $alamat, $no_hp, $email, $jml_pesanan, $deskripsi, $produk_id);
    if ($result) {
        header('Location: ../admin/orderList.php');
    } else {
        echo "Gagal";
    }
} else if ($action == 'delete') {
    $id = $_GET['id'];

    $result = $pesanan->delete($id);
    if ($result) {
        header('Location: ../admin/orderList.php');
    } else {
        echo "Gagal";
    }
} else if ($action == 'createBuyer') {
    $tanggal = $_POST['tanggal'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat_pemesan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jml_pesanan = $_POST['jumlah_pesanan'];
    $deskripsi = $_POST['deskripsi'];
    $produk_id = $_POST['produk_id'];

    $result = $pesanan->create($tanggal, $nama_pemesan, $alamat, $no_hp, $email, $jml_pesanan, $deskripsi, $produk_id);

    if ($result) {
        // alert and redirect to index.php
        echo "<script>alert('Pesanan berhasil dibuat!');window.location.href='../index.php';</script>";
    } else {
        echo "Gagal";
    }
}
