<?php
class GantiFoto extends Controller{
    public function index(){
        $data['judul'] = "Ganti Foto";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $this->view('templates/header',$data);
        $this->view('gantifoto/index');
        $this->view('templates/footer');
    } 
    public function updateFoto(){
        $title = "Update Foto ";
            move_uploaded_file($_FILES['foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/projectWeb/admin/public/img/".$_FILES['foto']['name']);
            if($this->model('modelGantiFoto')->updateFoto($_FILES['foto']['name'],$_POST['user'])>0){
                Flasher::setFlash($title,'BERHASIL','','success');
                $_SESSION['foto'] = $_FILES['foto']['name'];
                header("location: ".BASEURL."/GantiFoto");
                exit;
            }else{
                Flasher::setFlash($title,'GAGAL','','danger');
                header("location: ".BASEURL."/GantiFoto");
                exit;
            }
    }
}
?>