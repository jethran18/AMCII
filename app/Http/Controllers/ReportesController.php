<?php

namespace App\Http\Controllers;
use App\model\Actividad;
use PDF;
use DB;
use File;

use Dompdf\Dompdf;
use Dompdf\Options;

use Illuminate\Http\Request;

class ReportesController extends Controller
{

   public function generarReporteIndividual(Request $request) {
        
        $id = $request->id;
        $fecha_nombre =  date('Y-m-d');
        $nombre_archivo="Reporte_Mis_Actividades";
        $pdf = new Dompdf();
        $papel = 'letter';
        $orientacion='portrait';
        //consulta del usuario con tablero y actividades
        $actividades = DB::table('actividads')
            ->where('actividads.usuario_id', '=', $id)
            ->join('tableros', 'tableros.id', '=', 'actividads.tablero_id')
            ->select('actividads.status','tableros.nombreTablero', 'tableros.id')
            ->get();
        $tableros = DB::table('tableros')
            ->where('tableros.usuario_id', '=', $id)
            ->select('id','nombreTablero')
            ->get();
        //dd($actividades);
        $html=view('reporteIndividual')->with('actividades', $actividades)
                                    ->with('tableros',$tableros)
                                    ->with('fecha',$fecha_nombre);
        
        //crear pdf
        $pdf->setPaper($papel, $orientacion);
        $options = new Options();
        $options->set(['isHtml5ParserEnabled'=> true, 'isRemoteEnabled' =>true, 'isPhpEnabled' =>true]);
        $pdf->setOptions($options);
        $pdf->loadHtml($html);
        $pdf->render();
        return $pdf->stream($nombre_archivo.".pdf");
    }

    public function generarReporte() {
        $fecha_nombre =  date('Y-m-d');
        $nombre_archivo="Reporte";
        $pdf = new Dompdf();
        $papel = 'letter';
        $orientacion='portrait';
        //consulta del usuario con tablero y actividades
        $actividades = DB::table('actividads')
            ->select('status','usuario_id')
            ->get();
        $usaurios = DB::table('usuarios')
            ->where('usuarios.rol','=','user')
            ->select('id','username')
            ->get();
        $html=view('reporteAdmin')->with('actividades', $actividades)
                                    ->with('usuarios',$usaurios)
                                    ->with('fecha',$fecha_nombre);
        
        //crear pdf
        $pdf->setPaper($papel, $orientacion);
        $options = new Options();
        $options->set(['isHtml5ParserEnabled'=> true, 'isRemoteEnabled' =>true, 'isPhpEnabled' =>true]);
        $pdf->setOptions($options);
        $pdf->loadHtml($html);
        $pdf->render();
        return $pdf->stream($nombre_archivo.".pdf");
    }

}
