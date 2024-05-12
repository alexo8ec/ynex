<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Menu;
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
        } elseif ($r->submodulo == 'getMenu') {
            $data = Menu::getMenuGlobal();
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            return json_encode($results);
        } elseif ($r->submodulo == 'cambiarEstadoMenu') {
            return Menu::cambiarEstado($r);
        } else {
            return view('errors.view_404');
        }
    }
}
