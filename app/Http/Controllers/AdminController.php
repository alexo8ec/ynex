<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $_controlador = 'admin';
    protected $_datosversion = '';

    public function index(Request $r)
    {
        $data['controlador'] = $this->_controlador;
        $data['submodulo'] = $r->submodulo;
        if ($r->submodulo == '') {
            $data['content'] = view($this->_controlador . '.view_inicio');
        } elseif ($r->submodulo == 'logout') {
            session(['idUsuario' => '']);
            return redirect()->to('login');
        } else {
            return view('errors.view_404');
        }
        $newData = array_merge(config("data"), $data);
        config(['data' => $newData]);
        return view('layouts.view_childs');
    }
}
