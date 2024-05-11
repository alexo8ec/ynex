<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ThrottleConfig;
use App\Models\User;
use DateTime;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';
    public function index()
    {
        if (!Auth::check()) {
            return view('view_login');
        } else
            return redirect()->route('admin');
    }
    public function verificar2Feet()
    {
        $datos = session()->get('qr');
        return view('view_verification_two')->with([
            'message' => 'Lea el código QR con Google Authenticator, e ingrese el código abajo.',
            'qr' => $datos
        ]);
    }
    public function twoverification()
    {
        $codigo = $this->enableTwoFactor();
        session()->put('qr', $codigo);
        return redirect()->route('two-factor.index');
    }
    public function generateTwoFactorSecret()
    {
        $user = Auth::user();
        $user->two_factor_secret = Str::random(32);
        $user->save();
        return redirect()->route('two-factor.index');
    }
    public function verifyTwoFactor(Request $request)
    {
        $user = Auth::user();
        $google2fa = new Google2FA();
        $codigo = $request->one . $request->two . $request->three . $request->four . $request->five . $request->six;
        if (!$google2fa->verifyKey($user->google2fa_secret, $codigo)) {
            return redirect()->back()->withErrors(['code' => 'Código de autenticación incorrecto']);
        }
        $user->two_factor_enabled = true;
        $user->save();
        return redirect()->route('admin');
    }
    public function enableTwoFactor()
    {
        $user = Auth::user();
        $google2fa = new Google2FA();
        $secretKey = $google2fa->generateSecretKey();
        $user->google2fa_secret = $secretKey;
        $user->save();
        $google2fa_url = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secretKey
        );
        $logoPath = public_path('images\logo.png');
        return QrCode::size(150)
            ->errorCorrection('H')
            ->merge($logoPath, 0.5, true) // merge() agrega el logo
            ->generate($google2fa_url);
    }
    public function disableTwoFactor()
    {
        $user = Auth::user();
        $user->two_factor_enabled = false;
        $user->save();
        return redirect()->route('two-factor.index');
    }
    public function login(Request $request)
    {
        $usuario = User::where('email', $request->email)->first(['id']);
        if ($usuario != '') {
            $configIntentos = ThrottleConfig::where('id_usuario', $usuario->id)->first();
            if ($configIntentos) {
                if ($configIntentos->times_login !== null) {
                    $fecha1 = new DateTime();
                    $fecha2 = new DateTime($configIntentos->times_login);
                    $intervalo = $fecha1->diff($fecha2);
                    $minutosTras = $intervalo->format('%i');
                    if ($minutosTras < $configIntentos->decay_minutes) {
                        return redirect()->back()->with('message', 'Usuario bloqueado, intente dentro de ' . $configIntentos->decay_minutes . ' minutos');
                    } else {
                        $configIntentos->intentos_login = 0;
                        $configIntentos->times_login = null;
                        $configIntentos->save();
                    }
                }
                if ($configIntentos->intentos_login >= $configIntentos->max_attempts) {
                    $configIntentos->times_login = now();
                    $configIntentos->save();
                    return redirect()->back()->with('message', 'Usuario bloqueado, intente dentro de ' . $configIntentos->decay_minutes . ' minutos');
                }
                $configIntentos->intentos_login++;
                $configIntentos->save();
            } else {
                $configIntentos = new ThrottleConfig();
                $configIntentos->id_usuario = $usuario->id;
                $configIntentos->max_attempts = 3; // Definir un valor predeterminado si no está configurado en la base de datos
                $configIntentos->decay_minutes = 5; // Definir un valor predeterminado si no está configurado en la base de datos
                $configIntentos->save();
            }
        }
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $configIntentos->intentos_login = 0;
            $configIntentos->times_login = null;
            $configIntentos->save();
            return redirect()->intended('/admin');
        }
        return redirect()->back()->with('message', 'Usuario y/o contraseña incorrectos');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
