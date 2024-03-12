<?php 
namespace app\controllers;

use app\core\Controller;

class KegiatanController extends Controller{
    public function listKegiatan(){
        return $this->render('home/list-kegiatan');
    }
}
?>