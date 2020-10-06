<?php namespace App\Controllers;
use App\Models\IESModel;
use CodeIgniter\Controller;
class IESController extends BaseController
{
    public function index()
    {
        // $model = new IESModel();
        // $data =$model->getIES();
        // header('Content-Type: application/json');
        // echo json_encode($data);
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM institucion_educativa_superior');
        $results = $query->getResult();
        echo json_encode($results);
    }
    public function getone($id)
    {
        $model = new IESModel();        
        $data= $model->getIES($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}