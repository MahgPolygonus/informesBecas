<?php namespace App\Controllers;
 use App\Models\TotalesGeneralModel;
class Home extends BaseController
{
	public function index()
	{
		return view('Reportsview');
	}


	public function GeneralByFecha($desde, $hasta,$estado)
	{
        $model = new TotalesGeneralModel();        
        $data= $model->getDatosGeneralesbyFecha($desde,$hasta,$estado);
        header('Content-Type: application/json');
        echo json_encode($data);
	}
	//--------------------------------------------------------------------

}
