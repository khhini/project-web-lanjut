<?php
class ModelHeader{
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
    public function getFoto($username){
        $this->db->query('select foto from users where username=:username');
        $this->db->bind('username',$username);
        return $this->db->single();
    }
}
?>