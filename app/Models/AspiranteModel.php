<?php namespace App\Models;
use CodeIgniter\Model;
class AspiranteModel extends Model
{
protected $table = 'v_reportesFormularioBecas';
protected $allowedFields = ['id', 'primerNombre','segundoNombre','primerApellido','segundoApellido','id_comuna_residencia','IdLgtbi','idVulnerabilidad','idDiscapacidad','idAfro','Id_indigena','fecha_registro','periodo'];


public function getAspirantes($periodo = null)
{
    if($periodo==null)
    {
    return $this->where(['periodo' => 5])->findAll();
    }
    else
    {
        return $this->where(['periodo' => $periodo])->findAll();   
    }
}

public function getAspiranteById($id,$periodo = null)
{
    if($periodo==null)
    {
    return $this->where(['id' => $id],['periodo' => $periodo])
    ->findAll(); 
      }
    else
    {    return $this->where(['id' => $id],['periodo' =>5])
        ->findAll(); }
}

public function getAspirantebyComuna($id,$periodo = null)
{
    if($periodo==null)
    {
    return $this->where(['id_comuna_residencia' => $id],['periodo' => $periodo ])
    ->findAll();
  }
    else
    {
        return $this->where(['id_comuna_residencia' => $id],['periodo' => 5 ])
        ->findAll();
    }
}

public function getAspirantesByIES($id,$periodo = null)
{
    $db = \Config\Database::connect();
    $query = $db->query('SELECT rf.id,rf.primerNombre,rf.segundoNombre,rf.primerApellido,rf.segundoApellido,rf.id_comuna_residencia,rf.IdLgtbi,rf.idVulnerabilidad,rf.idDiscapacidad,rf.idAfro,rf.Id_indigena,rf.fecha_registro,ia.programaOpcion1,institucionOpcion1 FROM v_reportesFormularioBecas as rf inner join becas_aspirante_informacionacademica as ia on rf.id=ia.id_usuario where rf.periodo=5 and ia.institucionOpcion1='.$id);   
    if($periodo!=null)
    {
    $query = $db->query('SELECT rf.id,rf.primerNombre,rf.segundoNombre,rf.primerApellido,rf.segundoApellido,rf.id_comuna_residencia,rf.IdLgtbi,rf.idVulnerabilidad,rf.idDiscapacidad,rf.idAfro,rf.Id_indigena,rf.fecha_registro,ia.programaOpcion1,institucionOpcion1 FROM v_reportesFormularioBecas as rf inner join becas_aspirante_informacionacademica as ia on rf.id=ia.id_usuario where ia.institucionOpcion1='.$id.' and periodo='.$periodo);      
    }
    $results = $query->getResult();
    return $results;
}

public function getAspirantesByLgtbi()
{
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM v_reportesFormularioBecas WHERE IdLgtbi is not null and IdLgtbi<>'' ORDER BY IdLgtbi");

    $results = $query->getResult();
    return $results;
}

public function Hola(){
    return true;
}

}