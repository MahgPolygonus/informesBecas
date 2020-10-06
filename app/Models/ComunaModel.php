<?php namespace App\Models;
use CodeIgniter\Model;
class ComunaModel extends Model
{
protected $table = 'comuna';
protected $allowedFields = ['id', 'nombre','codigo','prioriza','prioriza2'];


public function getComuna()
{
 return $this->findAll();   
}
public function getComuna($id)
{
    return $this->where(['id' => $id])
    ->findAll();   
}
}