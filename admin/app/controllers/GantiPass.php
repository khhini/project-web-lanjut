<?php
class GantiPass extends Controller{
    public function index(){
        $data['judul'] = "Ganti Password";
        $data['notif'] = $this->model('modelHeader')->getAllNotification();
        $data['foto'] =  $this->model('modelHeader')->getFoto($_SESSION['user']);
        $this->view('templates/header',$data);
        $this->view('gantipass/index');
        $this->view('templates/footer');
    }
    public function update(){
        $title = "Update Password ";
        $cek = $this->model('modelGantiPass')->cekUser($_POST);
        echo $cek['cek'];
        if($cek['cek']>0){
            if($this->model('modelGantiPass')->updatePass($_POST)>0){
                Flasher::setFlash($title,'BERHASIL','','success');
                header("location: ".BASEURL."/GantiPass");
                exit;
            }else{
                Flasher::setFlash($title,'GAGAL','password baru tidak sama','danger');
                header("location: ".BASEURL."/GantiPass");
                exit;
            }
        }else{
            Flasher::setFlash($title,'GAGAL','password lama salah','danger');
            header("location: ".BASEURL."/GantiPass");
            exit;
        }
        
    }
}
?>