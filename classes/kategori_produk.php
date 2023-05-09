<?php
include_once('database.php');

class KategoriProduk
{
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM kategori_produk";
        $result = mysqli_query($this->connection, $sql);
        $kategori_produk = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($kategori_produk, $row);
        }

        return $kategori_produk;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM kategori_produk WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);
        $kategori_produk = mysqli_fetch_assoc($result);

        return $kategori_produk;
    }

    public function create($nama)
    {
        $sql = "INSERT INTO kategori_produk (nama) VALUES ('$nama')";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    public function update($id, $nama)
    {
        $sql = "UPDATE kategori_produk SET nama = '$nama' WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM kategori_produk WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }
}
