<?php namespace App\Models;
use CodeIgniter\Model;
use App\Models\TecnologiaModel;
class IESModel extends Model
{
protected $table = 'institucion_educativa_superior';
protected $allowedFields = ['id', 'nombre'];


public function getIES()
{
		$db = \Config\Database::connect();
        $query = $db->query('SELECT id,nombre FROM institucion_educativa_superior');
        $results = $query->getResult();
        foreach($results as $key=>$value)
          {
            $model = new TecnologiaModel();
            $data= $model->getTecnologiaByIES($value->id);
            $value->Tecnologias=$data;
            
          }
        return $results;
        
}

public function getIESById($id)
{
    return $this->where(['id' => $id])
    ->findAll();   
}
}