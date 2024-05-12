<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Catalogo extends Model
{
    private static $modelo = 'Catalogo';
    protected $table = 'catalogo';
    protected $primaryKey  = 'id';

    public static function getCatalogo($id = '')
    {
        if ($id == '') {
            return Catalogo::join('users as uc', 'catalogo.id_usuario_creacion', 'uc.id_usuario')
                ->join('users as um', 'catalogo.id_usuario_modificacion', 'um.id_usuario')
                ->whereNull('id_catalogo_pertenece')
                ->get([
                    'catalogo.id',
                    'catalogo.nombre',
                    'catalogo.codigo',
                    'catalogo.valor',
                    'catalogo.orden',
                    'catalogo.estado',
                    'catalogo.id_usuario_creacion',
                    'catalogo.id_usuario_modificacion',
                    DB::raw("DATE_FORMAT(catalogo.created_at, '%Y-%m-%d') as created_at"),
                    DB::raw("DATE_FORMAT(catalogo.updated_at, '%Y-%m-%d') as updated_at"),
                    'uc.usuario as usuario_creacion',
                    'um.usuario as usuario_modificacion'
                ]);
        } else {
            return Catalogo::find($id);
        }
    }
}
