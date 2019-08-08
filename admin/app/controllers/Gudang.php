<?php
class Gudang extends Controller{
    public function index(){
        $data['judul'] = "Gudang";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $data['cek'] =  $this->model('modelBarang')->getAllNotification();
        $this->view('templates/header',$data);
        $this->view('gudang/index',$data);
        $this->view('templates/footer');
    }
    public function detail($kode,$page = 1){
        $data['judul'] = "Gudang";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $data['cek'] = $this->model('modelBarang')->getAllNotification();
        $data['barang'] = $this->model('modelGudang')->getAllBarang($kode);
        $data['rows'] = $this->model('modelGudang')->getRowsBarang($kode);
        if(isset($_POST['cari'])){
            $data['cari'] = $this->model('modelGudang')->cariBarang($kode,$_POST['cari']);
        }
        $this->view('templates/header',$data);
        $this->view('gudang/detail',$data);
        $this->view('templates/footer');
    }
}
?>