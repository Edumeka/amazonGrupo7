<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $email = $request->input('email');

        $tokenData = DB::connection('mysql_usuarios')
            ->table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$tokenData) {
            return back()->withErrors(['email' => 'No se encontró un token para este correo.']);
        }

        // Proceder con la lógica de restablecimiento de contraseña...
    }
}
