<?php namespace App\Models;
use CodeIgniter\Model;
class ComunaModel extends Model
{
protected $table = 'comuna';
protected $allowedFields = ['id', 'nombre'];


public function getComuna()
{
        $db = \Config\Database::connect();
        $query = $db->query('SELECT id,nombre FROM comuna');
        $results = $query->getResult();
        return $results;
}

public function getComunaById($id)
{
    return $this->where(['id' => $id])
    ->findAll();   
}
}