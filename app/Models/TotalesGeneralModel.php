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

public function getInscritosbyWeek()
{	  
    $hoy=date("Y-m-d");
    $Dia=date("l");
    $Lunes="";
    $Domingo="";
    $array=array();
    switch ($Dia) {
      case 'Monday':
        $Lunes = $hoy;
        $Domingo = date("Y-m-d",strtotime($hoy."+ 6 days"));
        break;
        case 'Tuesday':
          $Lunes = date("Y-m-d",strtotime($hoy."- 1 days"));
        
          $Domingo = date("Y-m-d",strtotime($hoy."+ 5 days"));
        break;

        case 'Wednesday':
          $Lunes = date("Y-m-d",strtotime($hoy."- 2 days"));
          $Domingo = date("Y-m-d",strtotime($hoy."+ 4 days"));

        break;
        case 'Thursday':
          $Lunes = date("Y-m-d",strtotime($hoy."- 3 days"));
  
          $Domingo = date("Y-m-d",strtotime($hoy."+ 3 days"));

        break;
        case 'Friday':
          $Lunes = date("Y-m-d",strtotime($hoy."- 4 days"));

          $Domingo = date("Y-m-d",strtotime($hoy."+ 2 days"));

        break;
        case 'Saturday':
          $Lunes = date("Y-m-d",strtotime($hoy."- 5 days"));

          $Domingo = date("Y-m-d",strtotime($hoy."+ 1 days"));
        
        break;
        case 'Sunday':
          $Lunes = date("Y-m-d",strtotime($hoy."- 6 days"));

          $Domingo = $hoy;
        break;
    }
    $db = \Config\Database::connect();
    $query = $db->query("select cast(bi.fecha_registro AS date) as Fecha, count(bi.estado_convocatoria) as cuantos from bitacora_usuario bi inner join becas_estado_proceso be on bi.estado_convocatoria = be.id where bi.periodo = 5 and bi.tipo_convocatoria = 1 and bi.fecha_registro  between cast('".$Lunes."' AS date)  And  cast('".$Domingo."' AS date) GROUP BY cast(bi.fecha_registro AS date)");
    $results = $query->getResult();
    return $results;
}

}