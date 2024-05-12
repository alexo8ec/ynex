<?php

namespace App\Http\Controllers;

use App\Models\Menu;
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
        } elseif ($r->submodulo == 'verificarNombreMenu') {
            return Menu::verificarNombreMenu($r);
        } elseif ($r->submodulo == 'saveMenu') {
            return Menu::saveMenu($r);
        } elseif ($r->submodulo == 'agregarSubmenu') {
            $data['titulotabla'] = 'Lista de submenú';
            $data['idMenu'] = $r->id;
            $data['menuPadre'] = Menu::getMenuGlobal();
            $data['content'] = view($this->_controlador . '.view_submenu');
        } else {
            return view('errors.view_404');
        }
        $newData = array_merge(config("data"), $data);
        config(['data' => $newData]);
        return view('layouts.view_childs');
    }
}
