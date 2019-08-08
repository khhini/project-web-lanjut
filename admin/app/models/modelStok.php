<?php
class ModelStok{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getStok($page = 1){
        $per_hal = 10;
        $start = ($page - 1) * $per_hal;
        $this->db->query('select stok.idBarang, stok.notaMasuk, barang.foto, barang.namaBarang, gudang.deskripsi, stok.stok, masuk.tanggalMasuk from barang, stok, gudang, masuk where barang.idBarang = stok.idBarang and gudang.kodeArea = stok.kodeArea and masuk.notaMasuk = stok.notaMasuk  order by notaMasuk desc limit '.$start.', '.$per_hal);
        return $this->db->resultSet();
    }
    public function getStokById($nota){ 
        $this->db->query("select * from stok where notaMasuk = '$nota' order by notaMasuk desc");
        return $this->db->single();
    }
    public function getRowsBarang(){
        $this->db->query("select count(*) as rows from barang, stok, gudang, masuk where barang.idBarang = stok.idBarang and gudang.kodeArea = stok.kodeArea and masuk.notaMasuk = stok.notaMasuk ");
        return $this->db->Single();
    }
    public function cariBarang($key){
        $this->db->query("select stok.notaMasuk, barang.foto, barang.namaBarang, gudang.deskripsi, stok.stok, masuk.tanggalMasuk from barang, stok, gudang, masuk where barang.idBarang = stok.idBarang and gudang.kodeArea = stok.kodeArea and masuk.notaMasuk = stok.notaMasuk and ( barang.namabarang like '%$key%' or masuk.tanggalMasuk like '%$key%' or stok.notaMasuk like '%$key%') order by stok.notaMasuk desc");
        return $this->db->resultSet();
    }

    public function hapusStok($nota){
        $this->db->query("delete from stok where notaMasuk = '$nota'");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateStok($data){
        $this->db->query("update stok set kodeArea = '$data[kodeArea]', stok = '$data[jumlah]', satuan ='$data[satuan]' where notaMasuk = '$data[notaMasuk]' ");
        $this->db->execute();

        $this->db->query("update masuk set kodeArea = '$data[kodeArea]', jumlah = '$data[jumlah]', satuan ='$data[satuan]' where notaMasuk = '$data[notaMasuk]' ");
        $this->db->execute();

        return $this->db->rowCount();       
    }
}


?>