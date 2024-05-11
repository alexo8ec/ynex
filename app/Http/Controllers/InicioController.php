<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Util;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    protected $_controlador = 'inicio';
    protected $_datosversion = '';

    public function index(Request $r)
    {
        if ($r->submodulo == '') {
            return view('view_landing_page');
        }  else {
            return view('view_login');
        }
    }
}
