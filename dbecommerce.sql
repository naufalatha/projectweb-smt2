create table kategori_produk
(
    id   int auto_increment
        primary key,
    nama varchar(54) null
);

create table produk
(
    id                 int auto_increment
        primary key,
    kode               varchar(10) null,
    nama               varchar(50) null,
    harga_jual         double      null,
    harga_beli         double      null,
    stok               int         null,
    min_stok           int         null,
    deskripsi          text        null,
    kategori_produk_id int         not null,
    constraint produk_kategori_produk_id_fk
        foreign key (kategori_produk_id) references kategori_produk (id)
);

create table pesanan
(
    id             int auto_increment
        primary key,
    tanggal        date        null,
    nama_pemesan   varchar(45) null,
    alamat_pemesan varchar(45) null,
    no_hp          varchar(20) null,
    email          varchar(45) null,
    jumlah_pesanan int         null,
    deskripsi      text        null,
    produk_id      int         null,
    constraint pesanan_produk_id_fk
        foreign key (produk_id) references produk (id)
);


