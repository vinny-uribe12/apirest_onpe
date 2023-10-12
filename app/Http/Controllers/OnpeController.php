<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnpeController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function participacionVist(){
        return view('participacion');
    }
    
    public function participacion($estado=null, $departamento=null,$provincia=null){
        $parametros = $_SERVER['REQUEST_URI'];
        $parametros = str_replace("%20", " ", $parametros);
        $parametros  = explode ("/", $parametros);
        $parametros = array_slice($parametros,4);
        $long = count ($parametros);
        $stringparametros = implode("/",$parametros);
        
       if($long == 1)
       {
        $variables= DB::select('call sp_getVotos(1,25)');
        return view('participacion_total',['variables' => $variables, 'parametros' =>$stringparametros]);
       }
       else if ($long == 2)
       {
        $variables = DB::select("call sp_getVotosDepartamento('$departamento')");
        return view('participacion_total',['variables' => $variables, 'parametros' =>$stringparametros]);
       }
       else if ($long== 3)
       {
        $variables = DB::select("call sp_getVotosProvincia('$provincia')");
            return view('participacion_total',['variables' => $variables, 'parametros' =>$stringparametros]);
       }
       else
       {
            return view('participacion');
       }
    

    }
    public function actas_ubigeo(){
        return view('actas_ubigeo');
    }
    public function actas_numero(){
        $actas_numero = DB::select("call sp_getGrupoVotacion('000002')");
        return view('actas_numero', ['actas_numero'=>$actas_numero]);
    }
}
