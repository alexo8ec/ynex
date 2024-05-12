<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $_controlador = 'empresa';
    protected $_datosversion = '';

    public function index(Request $r)
    {
        $data['controlador'] = $this->_controlador;
        $data['submodulo'] = $r->submodulo != '' ? $r->submodulo : 'dashboard';
        if ($r->submodulo == 'cambiardeempresa') {
            Empresas::cambiarEmpresa();
            return redirect('/admin');
        } else {
            return view('errors.view_404');
        }
        $newData = array_merge(config("data"), $data);
        config(['data' => $newData]);
        return view('layouts.view_childs');
    }
}
