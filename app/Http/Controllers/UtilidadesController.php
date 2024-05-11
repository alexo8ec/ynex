<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Usuarios;
use App\Models\Util;
use Illuminate\Http\Request;

class UtilidadesController extends Controller
{
    protected $_controlador = 'utilidades';

    public function index(Request $r)
    {
        if ($r->submodulo == 'saveIntentosLogin') {
            return Util::saveIntentosLogin($r);
        } elseif ($r->submodulo == 'saveTiempoLogin') {
            return Util::saveTiempoLogin($r);
        } elseif ($r->submodulo == 'getCatalogo') {
            $data = Catalogo::getCatalogo();
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            return json_encode($results);
        } else {
            return view('errors.view_404');
        }
    }
}
