<?php namespace App\Controllers;
use App\Models\TecnologiaModel;
use CodeIgniter\Controller;
class TecnologiaController extends BaseController
{
    public function index()
    {
        $model = new TecnologiaModel();        
        $data= $model->getTecnologia();
        echo json_encode($data);
    }
    public function getone($id)
    {
        $model = new TecnologiaModel();        
        $data= $model->getTecnologiaById($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getTecnologiaByIES($id_ies)
    {
        $model = new TecnologiaModel();
        $data= $model->getTecnologiaByIES($id_ies);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}