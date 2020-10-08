<?php namespace App\Controllers;
use App\Models\AspiranteModel;
use CodeIgniter\Controller;
class AspiranteController extends BaseController
{
    public function index()
    {
        $model = new AspiranteModel();        
        $data= $model->getAspirantes();
        echo json_encode($data);
        
    }
    public function getone($id)
    {
        $model = new AspiranteModel();        
        $data= $model->getAspiranteById($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getAspiranteByIES($id_ies)
    {
        $model = new AspiranteModel();
        $data= $model->getAspirantesByIES($id_ies);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getAspirantesByLgtbi()
    {
        $model = new AspiranteModel();
        $data= $model->getAspirantesByLgtbi();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}