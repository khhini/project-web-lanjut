<?php
class ModelBarang{
    private $table1 = 'barang';
    private $table2 = 'stok';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getAllNotification(){
        
        $this->db->query('Select '.$this->table1.'.idBarang, '.$this->table1.'.namaBarang, sum('.$this->table2.'.stok) as jmlh, '.$this->table2.'.satuan from '.$this->table1.', '.$this->table2.' where '.$this->table1.'.idBarang = '.$this->table2.'.idBarang group by '.$this->table2.'.idBarang having sum('.$this->table2.'.stok)<= 3');
        return $this->db->resultSet();
    }
    public function getAllBarang($page = 1){
        $per_hal = 10;
        $start = ($page - 1) * $per_hal;
        $this->db->query('select barang.*, ifnull(sum(stok.stok),0) as jumlah from barang left join stok on barang.idBarang = stok.idBarang group by barang.idBarang limit '.$start.', '.$per_hal);
        return $this->db->resultSet();
    }
    public function getRowsBarang(){
        $this->db->query('select count(*) as rows from barang');
        return $this->db->Single();
    }
    public function cariBarang($key = ''){
        $this->db->query("select barang.*, sum(stok.stok) as jumlah from barang, stok, kategori where barang.idBarang = stok.idBarang and barang.idKategori = kategori.idKategori and (namaBarang like '%$key%' or kategori like '%$key%') group by stok.idBarang");
        return $this->db->resultSet();
    }
    public function cekBarang($idBarang){
        $this->db->query("select count(*) as jmlh from barang where idBarang ='$idBarang'");
        if($this->db->single()['jmlh']>0){
            return true;
        }else{
            return false;
        }
    }
    public function getJenisBarang(){
        $this->db->query("select * from kategori");
        return $this->db->resultSet();
    }
    public function genIdBarang($kodeKategori){
        $kodeKategori = substr($kodeKategori,0,3);
        $this->db->query("select * from barang where idBarang like'$kodeKategori%' order by idBarang desc");
        $cek = $this->db->single();
        if((int)substr($cek['idBarang'],3)<10){
            $nota = substr($cek['idBarang'],0,3)."00".((int)substr($cek['idBarang'],3)+1);
        }else if((int)substr($cek['idBarang'],3)<100){
            $nota = substr($cek['idBarang'],0,3)."0".((int)substr($cek['idBarang'],3)+1);
        }else{
            $nota = substr($cek['idBarang'],0,3).((int)substr($cek['idBarang'],3)+1);
        }
        $nota = $nota;
        return $nota;
    }
    public function genNota(){
        $notaMasuk = "M-".date("ymd");
        $this->db->query("select notaMasuk from masuk where notaMasuk like '$notaMasuk%' order by notaMasuk desc");
        $cek = substr($this->db->single()['notaMasuk'],8);
        if(((int)$cek) < 9){
            $notaMasuk = $notaMasuk."0".($cek+1);
        }else{
            $notaMasuk = $notaMasuk.($cek+1);
        }
        return $notaMasuk;
    }
    public function tambahBarang($data,$foto = null){
        $tanggal = date('Y-m-d');
        $nota = $this->genNota();
        if(strlen($data['nama'])>9){
            $cek = substr($data['nama'],0,6);
            $idBarang = $cek;
            if(!$this->cekBarang($cek)){
                $kodeKategori= substr($data['jenis'],0,3);
                $idBarang = $this->genIdBarang($data['jenis']);
                $query = "insert into barang values('$idBarang','$data[nama]','$data[deskripsi]','$kodeKategori','')";
                $this->db->query($query);
                $this->db->execute();
            }
            echo $nota;
            $query = "insert into masuk values('$nota','$tanggal','$idBarang','$data[kodeArea]','$data[jumlah]','$data[satuan]')";
            $this->db->query($query);
            $this->db->execute();
            
            $query = "insert into stok values('$idBarang','$nota','$data[kodeArea]','$data[modal]','$data[harga]','$data[jumlah]','$data[satuan]')";
            $this->db->query($query);
            $this->db->execute();
        }else{
            $kodeKategori= substr($data['jenis'],0,3);
            $idBarang = $this->genIdBarang($data['jenis']);
            $query = "insert into barang values('$idBarang','$data[nama]','$data[deskripsi]','$kodeKategori','')";
            $this->db->query($query);
            $this->db->execute();
            
            $query = "insert into masuk values('$nota','$tanggal','$idBarang','$data[kodeArea]','$data[jumlah]','$data[satuan]')";
            $this->db->query($query);
            $this->db->execute();
                
            $query = "insert into stok values('$idBarang','$nota','$data[kodeArea]','$data[modal]','$data[harga]','$data[jumlah]','$data[satuan]')";
            $this->db->query($query);
            $this->db->execute();
        }
        if($foto != null){
            $query = "update barang set foto = '$foto' where idBarang ='$idBarang'";
            $this->db->query($query);
            $this->db->execute();
        }
        return $this->db->rowCount();
        
    }
    public function getBarangById($id){
        $this->db->query("SELECT ifnull(sum(stok.stok),0) as jumlah , temp.* from (select barang.*, kategori.kategori from barang, stok,kategori where barang.idKategori = kategori.idKategori) as temp left join stok on temp.idBarang = stok.idBarang where temp.idBarang = '$id' group by temp.idBarang ");
        return $this->db->single();
    }
    public function getDetStokBarang($id){
        $this->db->query("select stok.*, masuk.tanggalMasuk, gudang.deskripsi from stok, gudang, masuk where stok.notaMasuk = masuk.notaMasuk and stok.kodeArea = gudang.kodeArea and stok.idBarang ='$id' order by stok.notaMasuk desc");
        return $this->db->resultSet();
    }
    public function editBarang($data){
        $query = "update barang set namaBarang = '$data[nama]', idKategori = '$data[jenis]', deskripsiBarang = '$data[deskripsi]' where idBarang ='$data[id]'";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
}
?>