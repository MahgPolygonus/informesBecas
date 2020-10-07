<?php namespace App\Controllers;
use App\Models\ComunaModel;
use CodeIgniter\Controller;
class ComunaController extends BaseController
{
    public function index()
    {
    
        $model = new ComunaModel();        
        $data= $model->getComuna();
        echo json_encode($data);
    }
    
    public function getone($id)
    {
        $model = new ComunaModel();        
        $data= $model->getComunabyid($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}