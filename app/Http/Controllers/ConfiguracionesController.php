<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    protected $_controlador = 'configuraciones';
    protected $_datosversion = '';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $r)
    {
        $data['controlador'] = $this->_controlador;
        $data['submodulo'] = $r->submodulo;
        if ($r->submodulo == 'usuario') {
            $data['content'] = view($this->_controlador . '.view_config_usuario');
        } elseif ($r->submodulo == 'menu') {
            $data['titulotabla'] = 'Lista de menú';
            $data['content'] = view($this->_controlador . '.view_menu');
        } elseif ($r->submodulo == 'catalogo') {
            $data['titulotabla'] = 'Lista de catalogo';
            $data['content'] = view($this->_controlador . '.view_catalogo');
        } else {
            return view('errors.view_404');
        }
        $newData = array_merge(config("data"), $data);
        config(['data' => $newData]);
        return view('layouts.view_childs');
    }
}
