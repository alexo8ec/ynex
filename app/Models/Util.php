<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Util extends Model
{
    public static function traerCatalogo($tipo)
    {
        $catalogo = Catalogo::where('codigo', 'like', '%' . $tipo . '%')->whereNull('id_catalogo_pertenece')->first(['id']);
        return Catalogo::where('id_catalogo_pertenece', $catalogo->id_catalogo)->get();
    }
    public static function saveIntentosLogin($r)
    {
        $configIntentos = ThrottleConfig::where('id_usuario', Auth::user()->id)->first();
        if ($configIntentos) {
            $configIntentos->max_attempts = $r->max_attempts;
            $configIntentos->save();
        } else {
            $configIntentos = new ThrottleConfig();
            $configIntentos->id_usuario = Auth::id();
            $configIntentos->max_attempts = $r->max_attempts;
            $configIntentos->save();
        }
    }
    public static function saveTiempoLogin($r)
    {
        $configIntentos = ThrottleConfig::where('id_usuario', Auth::user()->id)->first();
        if ($configIntentos) {
            $configIntentos->decay_minutes = $r->decay_minutes;
            $configIntentos->save();
        } else {
            $configIntentos = new ThrottleConfig();
            $configIntentos->id_usuario = Auth::id();
            $configIntentos->decay_minutes = $r->decay_minutes;
            $configIntentos->save();
        }
    }
    public static function resetPassword($r)
    {
    }
    public static function getKeyPassword()
    {
        return '|FACTURALGO_2004|';
    }
    public static function obtenerIPCliente()
    {
        $ip = '';
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
