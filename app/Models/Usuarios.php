<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class Usuarios extends Authenticatable
{
    use TwoFactorAuthenticatable;

    // Generar secreto de verificación en dos pasos
    public function generateTwoFactorSecret()
    {
        $this->two_factor_secret = $this->generateTwoFactorSecretKey();
        $this->save();
    }
    
    private static $modelo = 'Usuarios';
    protected $table = 'usuarios';
    protected $primaryKey  = 'id_usuario';

    public static function getUsuarios($id = '')
    {
        if ($id == '') {
            return Usuarios::all();
        } else {
            return Usuarios::find($id);
        }
    }
    public static function validacionLogin($u, $c)
    {
        $mensaje = '';
        $usuario = Usuarios::where('usuario', $u)->first();
        if ($usuario != '') {
            if ($usuario->estado == 1) {
                $usuario = $usuario->where('clave', md5($u . Util::getKeyPassword() . $c))->first();
                if ($usuario != '') {
                    $mensaje = 'Ok|success|' . $usuario->id_usuario;
                    session('idUsuario', $usuario->id_usuario);
                } else {
                    $mensaje = 'Usuario y/o contraseña incorrectos|danger';
                }
            } else {
                $mensaje = 'Usuario desactivado|warning';
            }
        } else {
            $mensaje = 'El usuario no existe|danger';
        }
        return $mensaje;
    }
}
