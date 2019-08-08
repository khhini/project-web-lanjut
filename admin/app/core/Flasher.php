<?php


class Flasher {
    public static function setFlash($bagian, $pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'bagian' => $bagian,
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if( isset($_SESSION['flash'])  ) {
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] . '" role="alert">
            '. $_SESSION['flash']['bagian'] . ' <strong>'. $_SESSION['flash']['pesan'] .'</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            unset($_SESSION['flash']);
        }
    }
}