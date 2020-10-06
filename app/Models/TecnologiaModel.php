<?php namespace App\Models;
use CodeIgniter\Model;
class TecnologiaModel extends Model
{
protected $table = 'tecnologia';
protected $allowedFields = ['id', 'nombre','id_ies','cupos'];


public function getTecnologia()
{
 return $this->findAll();   
}
public function getTecnologia($id)
{
    return $this->where(['id' => $id])
    ->findAll();   
}
}