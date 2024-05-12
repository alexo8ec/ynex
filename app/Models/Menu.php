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

    public static function saveMenu($r)
    {
        $arrayRespuesta = [];
        try {
            if ($r->id_menu == '') {
                $menu = new Menu();
                $menu->nombre = $r->nombre;
                $menu->controlador = $r->controlador;
                $menu->icono = $r->icono;
                $menu->estado = 1;
                $menu->orden = $r->orden;
                $menu->id_usuario_creacion = Auth::user()->id;
                $menu->id_usuario_modificacion = Auth::user()->id;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->updated_at = date('Y-m-d H:i:s');
                $menu->save();
            } else {
                $menu = Menu::find($r->id_menu);
                $menu->nombre = $r->nombre;
                $menu->controlador = $r->controlador;
                $menu->icono = $r->icono;
                $menu->estado = $r->estado;
                $menu->orden = $r->orden;
                $menu->id_usuario_modificacion = Auth::user()->id;
                $menu->updated_at = date('Y-m-d H:i:s');
                $menu->save();
            }
            $arrayRespuesta = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Datos guardados correctamente',
                'reload' => ''
            ];
        } catch (\Exception $e) {
            $arrayRespuesta = [
                'status' => 'error',
                'code' => 500,
                'message' => $e->getMessage(),
                'modelo' => self::$modelo,
                'metodo' => __METHOD__,
                'ruta' => __FILE__,
                'linea' => __LINE__,
            ];
        }
        return $arrayRespuesta;
    }
    public static function verificarNombreMenu($r)
    {
        $arrayRespuesta = [];
        $menu = Menu::where('nombre', $r->nombre)->count();
        if ($menu > 0) {
            $arrayRespuesta = [
                'status' => 'info',
                'code' => 500,
                'message' => 'El nombre del menu ya existe',
                'modelo' => self::$modelo,
                'metodo' => __METHOD__,
                'ruta' => __FILE__,
                'linea' => __LINE__,
            ];
        } else {
            $arrayRespuesta = [
                'status' => 'success',
                'code' => 200,
                'message' => 'El nombre del menu no existe',
                'modelo' => self::$modelo,
                'metodo' => __METHOD__,
                'ruta' => __FILE__,
                'linea' => __LINE__,
            ];
        }
        return $arrayRespuesta;
    }
    public static function cambiarEstado($r)
    {
        $arrayRespuesta = [];
        try {
            $estado = 0;
            if ($r->estado == 1) {
                $estado = 0;
            } else {
                $estado = 1;
            }
            Menu::where('id_menu', $r->id)->update(['estado' => $estado]);
            $arrayRespuesta = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Datos guardados correctamente',
                'reload' => ''
            ];
        } catch (\Exception $e) {
            $arrayRespuesta = [
                'status' => 'error',
                'code' => 500,
                'message' => $e->getMessage(),
                'modelo' => self::$modelo,
                'metodo' => __METHOD__,
                'ruta' => __FILE__,
                'linea' => __LINE__,
            ];
        }
        return $arrayRespuesta;
    }
    public static function getSubMenuGlobal($id, $idSub = '')
    {
        if ($idSub == '') {
            return Menu::join('users as uc', 'menu.id_usuario_creacion', 'uc.id_usuario')
                ->join('users as um', 'menu.id_usuario_modificacion', 'um.id_usuario')
                ->where('id_pertenece', $id)
                ->get();
        } else {
            return Menu::find($idSub);
        }
    }
    public static function getMenuGlobal($id = '')
    {
        if ($id == '') {
            return Menu::join('users as uc', 'menu.id_usuario_creacion', 'uc.id_usuario')
                ->join('users as um', 'menu.id_usuario_modificacion', 'um.id_usuario')
                ->whereNull('id_pertenece')
                ->get([
                    'menu.id_menu',
                    'menu.nombre',
                    'menu.controlador',
                    'menu.icono',
                    'menu.estado',
                    'menu.orden',
                    'menu.created_at',
                    'menu.updated_at',
                    'uc.usuario as usuario_creacion',
                    'um.usuario as usuario_modificacion'
                ]);
        } else {
            return Menu::find($id);
        }
    }
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
