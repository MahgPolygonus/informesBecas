<?php namespace App\Models;
use CodeIgniter\Model;
class IESModel extends Model
{
protected $table = 'institucion_educativa_superior';
protected $allowedFields = ['id', 'nombre'];


public function getIES()
{
		$db = \Config\Database::connect();
        $query = $db->query('SELECT id,nombre FROM institucion_educativa_superior');
        $results = $query->getResult();
        return $results;
}

public function getIESById($id)
{
    return $this->where(['id' => $id])
    ->findAll();   
}
}