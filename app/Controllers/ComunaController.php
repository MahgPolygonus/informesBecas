<?php namespace App\Controllers;
use App\Models\ComunaModel;
use CodeIgniter\Controller;
class ComunaController extends BaseController
{
    public function index()
    {
        // $model = new ComunaModel();
        // $data =$model->getComuna();
        // header('Content-Type: application/json');
        // echo json_encode($data);
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM comuna');
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