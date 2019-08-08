<?php
class Stok extends Controller{
    public function index($page = 1){
        $data['judul'] = "Stok";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $data['barang']= $this->model('modelStok')->getStok($page);
        $data['rows'] = $this->model('modelStok')->getRowsBarang();
        $data['kodeArea'] = $this->model('modelGudang')->getListGudang();
        if(isset($_POST['cari'])){
            $data['cari'] = $this->model('modelStok')->cariBarang($_POST['cari']);
        }
        $this->view('templates/header',$data);
        $this->view('stok/index',$data);
        $this->view('templates/footer',$data);
    }
    public function hapus($nota,$id){
        $title = "Hapus Stok ";
        if($this->model('modelStok')->hapusStok($nota)>0){
            Flasher::setFlash($title,'BERHASIL','','success');
            header("location: ".BASEURL."/Barang/detail/$id");
            exit;
        }else{
            Flasher::setFlash($title,'GAGAL','','danger');
        }
    }
    public function getEdit(){
        echo json_encode($this->model('modelStok')->getStokById($_POST['nota']));
    }
    public function update(){
        $title = "Update Stok ";
        if($this->model('modelStok')->updateStok($_POST)>0){
            Flasher::setFlash($title,'BERHASIL','','success');
            header("location: ".BASEURL."/Barang/detail/$_POST[idBarang]");
            exit;
        }else{
            Flasher::setFlash($title,'GAGAL','','danger');
        }
    }
}
?>