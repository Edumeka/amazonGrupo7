<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Verificar si el correo electrónico existe en la base de datos 'mysql_usuarios'
        $usuario = User::where('email', $request->email)->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'Este correo no está registrado en nuestro sistema.']);
        }

        // Enviaremos el enlace de restablecimiento de contraseña a este usuario. Una vez que
// hayamos intentado enviar el enlace, examinaremos la respuesta para ver el mensaje
// que necesitamos mostrar al usuario. Finalmente, enviaremos la respuesta correspondiente.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}
