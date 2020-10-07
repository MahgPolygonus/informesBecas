<?php namespace App\Models;
use CodeIgniter\Model;
class TecnologiaModel extends Model
{
protected $table = 'tecnologia';
protected $allowedFields = ['id', 'nombre','id_ies','cupos'];


public function getTecnologia()
{
		$db = \Config\Database::connect();
        $query = $db->query('SELECT id,nombre,id_ies,cupos FROM tecnologia');
        $results = $query->getResult();
        return $results;
}

public function getTecnologiaById($id)
{
    return $this->where(['id' => $id])
    ->findAll();   
}

public function getTecnologiaByIES($id_ies)
{
	return $this->where(['id_ies'=> $id_ies])
	->findAll();
}
}