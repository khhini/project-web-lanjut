<?php
class ModelGudang{
    private $table1 = 'gudang';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getListGudang(){
        
        $this->db->query('Select * from '.$this->table1);
        return $this->db->resultSet();
    }
    public function getAllBarang($kode,$page = 1){
        $per_hal = 10;
        $start = ($page - 1) * $per_hal;
        $this->db->query("select barang.*, sum(stok.stok) as jumlah from barang, stok where barang.idBarang = stok.idBarang and stok.kodeArea = '$kode' group by stok.idBarang limit $start, $per_hal");
        return $this->db->resultSet();
    }

    public function getRowsBarang($kode){
        $this->db->query("select count(*) as rows from (select barang.*, sum(stok.stok) as jumlah from barang, stok where barang.idBarang = stok.idBarang and stok.kodeArea = '$kode' group by stok.idBarang) as test");
        return $this->db->Single();
    }

    public function cariBarang($kode,$key = ''){
        $this->db->query("select barang.*, sum(stok.stok) as jumlah from barang, stok, kategori where barang.idBarang = stok.idBarang and barang.idKategori = kategori.idKategori and stok.kodeArea = '$kode' and (namaBarang like '%$key%' or kategori like '%$key%') group by stok.idBarang");
        return $this->db->resultSet();
    }
}
?>