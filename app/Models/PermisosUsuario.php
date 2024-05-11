<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermisosUsuario extends Model
{
    private static $modelo = 'Permisos';
    protected $table = 'permisos_usuario';
    protected $primaryKey  = 'id_permiso';
}
