<?php namespace App\Models;
use CodeIgniter\Model;
class IESModel extends Model
{
protected $table = 'institucion_educativa_superior';
protected $allowedFields = ['id', 'nombre'];


public function getIES()
{
 return $this->findAll();   
}
public function getIES($id)
{
    return $this->where(['id' => $id])
    ->findAll();   
}
}