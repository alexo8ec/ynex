<?php

namespace App\Http\Middleware;

use App\Models\Menu;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Primicia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($r, Closure $next)
    {
        $data['menu'] = Menu::getMenu();
        $data['usuario'] = User::getUsuarios(Auth::user()->id);
        if (session('periodo') == date('Y'))
            session(['periodo' => date('Y')]);
        config(['data' => $data]);
        return $next($r);
    }
}
