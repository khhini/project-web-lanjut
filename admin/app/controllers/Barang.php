<?php
class Barang extends Controller{
    public function index($page = 1){
        $data['judul'] = "Barang";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $data['cek'] =  $this->model('modelBarang')->getAllNotification();
        $data['barang'] =  $this->model('modelBarang')->getAllBarang($page);
        $data['jenis'] =  $this->model('modelBarang')->getJenisBarang();
        $data['kodeArea'] = $this->model('modelGudang')->getListGudang();
        if(isset($_POST['cari'])){
            $data['cari'] = $this->model('modelBarang')->cariBarang($_POST['cari']);
        }
        $data['rows'] = $this->model('modelBarang')->getRowsBarang();
        $this->view('templates/header',$data);
        $this->view('barang/index',$data);
        $this->view('templates/footer');
    }

    public function tambah(){
        move_uploaded_file($_FILES['foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/projectWeb/admin/public/img/brg/".$_FILES['foto']['name']);
        if(isset($_FILES['foto'])){
            move_uploaded_file($_FILES['foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/projectWeb/admin/public/img/brg/".$_FILES['foto']['name']);
            if($this->model('modelBarang')->tambahBarang($_POST,$_FILES['foto']['name'])>0){
                header("location: ".BASEURL."/Barang");
                exit;
            }
        }else{
            if($this->model('modelBarang')->tambahBarang($_POST)>0){
                header("location: ".BASEURL."/Barang");
                exit;
           }
        }
        
    }
    public function aksiEdit(){
        $title = "Update Barang ";
        if($this->model('modelBarang')->editBarang($_POST)>0){
            Flasher::setFlash($title,'BERHASIL','','success');
            header("location: ".BASEURL."/Barang");
            exit;
        }else{
            Flasher::setFlash($title,'GAGAL','','danger');
            header("location: ".BASEURL."/Barang");
            exit;
        }
    }

    public function detail($id){
        $data['judul'] = 'Detail Barang';
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $data['barang'] = $this->model('modelBarang')->getBarangById($id);
        $data['stok'] = $this->model('modelBarang')->getDetStokBarang($id);
        $this->view('templates/header', $data);
        $this->view('barang/detail', $data);
        $this->view('templates/footer');
    }
    public function edit($id){
        $data['judul'] = 'Detail Barang';
        $data['barang'] = $this->model('modelBarang')->getBarangById($id);
        $data['jenis'] =  $this->model('modelBarang')->getJenisBarang();
        $this->view('templates/header', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');
    }
}
?>