<?php namespace App\Controllers;
use App\Models\TecnologiaModel;
use CodeIgniter\Controller;
class TecnologiaController extends BaseController
{
    public function index()
    {
        // $model = new TecnologiaModel();
        // $data =$model->getTecnologia();
        // header('Content-Type: application/json');
        // echo json_encode($data);
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM tecnologia');
        $results = $query->getResult();
        echo json_encode($results);
    }
    public function getone($id)
    {
        $model = new ComunaModel();        
        $data= $model->getComuna($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}