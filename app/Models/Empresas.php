<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresas extends Model
{
    private static $modelo = 'Empresas';
    protected $table = 'empresas';
    protected $primaryKey  = 'id_empresa';

    public static function cambiarEmpresa()
    {
        session()->put('idEmpresa', '');
    }
    public static function setEmpresa($id)
    {
        session()->put('idEmpresa', $id);
    }
    public static function getEmpresas()
    {
        return Empresas::where('eliminado', 0)->get();
    }
}
