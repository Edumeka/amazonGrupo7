<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Mostrar la vista de registro.
     */
    public function create(): View
    {
        return view('auth.register'); // Devuelve la vista del formulario de registro
    }

    

    /**
     * Manejar una solicitud de registro entrante.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación de los campos
        $request->validate([
            'NOMBRE' => ['required', 'string', 'max:255'],
            'APELLIDO' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'], // Validación de password y confirmación
            'TELEFONO' => ['required', 'string', 'max:20'],
            'FECHA_NACIMIENTO' => ['required', 'date'],
        ]);

        // Crear el usuario
        $user = User::create([
            'NOMBRE' => $request->NOMBRE,
            'APELLIDO' => $request->APELLIDO,
            'email' => $request->email,
            'email_verified_at'=> $request->email,
           'CORREO' => $request->email, // Guarda el mismo correo en el campo 'CORREO' en la base de datos
           'CONTRASENIA' => Hash::make($request->password), // Usamos 'password' aquí 
           'password' => Hash::make($request->password), // Usamos 'password' aquí
            'TELEFONO' => $request->TELEFONO, // Asegúrate de incluir 'TELEFONO'
            'FECHA_NACIMIENTO' => $request->FECHA_NACIMIENTO,
            'FECHA_CREACION' => now(),
            'CODIGO_ESTADO' => 1,  // Cambia estos valores según tu estructura de base de datos
            'CODIGO_GENERO' => 1,
            'CODIGO_ROL' => 1,
            'CODIGO_DIRECCION' => 1,
        ]);

        // Otros pasos
        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false)); // Redirige al dashboard
    }
}
