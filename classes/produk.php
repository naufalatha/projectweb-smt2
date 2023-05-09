<?php
include_once('database.php');

class Produk
{
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT produk.*, kategori_produk.nama AS nama_kategori FROM produk JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id";
        $result = mysqli_query($this->connection, $sql);
        $produk = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($produk, $row);
        }

        return $produk;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM produk WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);
        $produk = mysqli_fetch_assoc($result);

        return $produk;
    }

    public function create($kode, $nama, $harga_jual, $harga_beli, $stok, $min_stok, $deskripsi, $kategori)
    {
        $sql = "INSERT INTO produk(kode, nama, harga_jual, harga_beli, stok, min_stok, deskripsi, kategori_produk_id) VALUES('$kode', '$nama', '$harga_jual', '$harga_beli', '$stok', '$min_stok', '$deskripsi', '$kategori')";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    public function update($id, $kode, $nama, $harga_jual, $harga_beli, $stok, $min_stok, $deskripsi, $kategori)
    {
        $sql = "UPDATE produk SET kode = '$kode', nama = '$nama', harga_jual = '$harga_jual', harga_beli = '$harga_beli', stok = '$stok', min_stok = '$min_stok', deskripsi = '$deskripsi', kategori_produk_id = '$kategori' WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM produk WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }
}
