<?php namespace App\Models;
use CodeIgniter\Model;
class TotalesGeneralModel extends Model
{


public function getDatosGenerales()
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

public function getDatosGeneralesbyFecha($Desde, $Hasta, $Estado)
{	
    $db = \Config\Database::connect();
    $query = $db->query('select count(bi.estado_convocatoria) as Result from bitacora_usuario bi inner join becas_estado_proceso be on bi.estado_convocatoria = be.id where bi.periodo = 5 and bi.tipo_convocatoria = 1  and bi.estado_convocatoria = '.$Estado.' and bi.fecha_registro between CAST("'.$Desde.'" AS DATE) and CAST("'.$Hasta.'" AS DATE);');
    $results = $query->getResult();
    return $results;
}
}