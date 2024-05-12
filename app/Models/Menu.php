<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    private static $modelo = 'Menu';
    protected $table = 'menu';
    protected $primaryKey  = 'id_menu';

    public static function getMenu()
    {
        $menu = [];
        $array = [];
        $permisos = PermisosUsuario::where('id_usuario', Auth::user()->id)->first(['permisos']);
        if ($permisos != '') {
            $permisos = json_decode($permisos->permisos);
            $menu = Menu::select(
                DB::raw('CASE WHEN ROW_NUMBER() OVER (PARTITION BY menu.nombre ORDER BY menu.id_menu) = 1 THEN menu.nombre ELSE "" END AS nombre_menu'),
                'menu.controlador',
                'menu.icono AS icono_menu',
                's.id_menu',
                's.nombre AS nombre_submenu',
                's.funcion',
                's.icono AS icono_submenu'
            )
                ->join('menu as s', 'menu.id_menu', '=', 's.id_pertenece')
                ->whereNull('menu.id_pertenece')
                ->whereIn('s.id_menu', $permisos)
                ->where('menu.estado', 1)
                ->orderBy('menu.orden')
                ->get();
            $array = [];
        }
        foreach ($menu as $dato) {
            if (!empty($dato['nombre_menu'])) {
                $elemento = [
                    'nombre_menu' => $dato['nombre_menu'],
                    'icono_menu' => $dato['icono_menu'],
                    'controlador' => $dato['controlador'],
                    'submodulos' => []
                ];
                $elemento['submodulos'][] = [
                    'nombre_submenu' => $dato['nombre_submenu'],
                    'icono_submenu' => $dato['icono_submenu'],
                    'funcion' => $dato['funcion']
                ];
                $array[] = $elemento;
            } else {
                $ultimoIndice = count($array) - 1;
                $array[$ultimoIndice]['submodulos'][] = [
                    'nombre_submenu' => $dato['nombre_submenu'],
                    'icono_submenu' => $dato['icono_submenu'],
                    'funcion' => $dato['funcion']
                ];
            }
        }
        return $array;
    }
}
