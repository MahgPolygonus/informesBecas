<?php namespace App\Controllers;
use App\Models\IESModel;
use CodeIgniter\Controller;
class IESController extends BaseController
{

    public function index()
    {

        return view('IESview');

    }

    public function getall()
    {
        $model = new IESModel();        
        $data= $model->getIES();
        echo json_encode($data);
    }

    public function getone($id)
    {
        $model = new IESModel();        
        $data= $model->getIESById($id);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}