<?php
include_once('database.php');

class Pesanan
{
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function getAllOrderWithProduct()
    {
        $sql = "SELECT pesanan.*, produk.nama AS nama_produk, (produk.harga_jual * pesanan.jumlah_pesanan) AS total_harga FROM pesanan JOIN produk ON pesanan.produk_id = produk.id";
        $result = mysqli_query($this->connection, $sql);
        $pesanan = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($pesanan, $row);
        }

        return $pesanan;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM pesanan WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);
        $pesanan = mysqli_fetch_assoc($result);

        return $pesanan;
    }

    public function create($tanggal, $nama_pemesan, $alamat, $no_hp, $email, $jml_pesanan, $deskripsi, $produk_id)
    {
        $sql = "INSERT INTO pesanan (tanggal, nama_pemesan, alamat_pemesan, no_hp, email, jumlah_pesanan, deskripsi, produk_id) VALUES ('$tanggal', '$nama_pemesan', '$alamat', '$no_hp', '$email', '$jml_pesanan', '$deskripsi', '$produk_id')";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    public function update($id, $tanggal, $nama_pemesan, $alamat, $no_hp, $email, $jml_pesanan, $deskripsi, $produk_id)
    {
        $sql = "UPDATE pesanan SET tanggal = '$tanggal', nama_pemesan = '$nama_pemesan', alamat_pemesan = '$alamat', no_hp = '$no_hp', email = '$email', jumlah_pesanan = '$jml_pesanan', deskripsi = '$deskripsi', produk_id = '$produk_id' WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pesanan WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }
}
