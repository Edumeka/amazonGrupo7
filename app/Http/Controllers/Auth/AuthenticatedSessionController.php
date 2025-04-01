<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
       
      
        // Obtén el usuario autenticado
        $user = Auth::user();       
    
    
        \Log::info('User authenticated and session regenerated', ['user_id' => $user]);

          // Verifica si el usuario está autenticado después de regenerar la sesión
    if (!Auth::check()) {
        \Log::error('La autenticación falló después de regenerar la sesión.');
        return redirect()->route('login')->withErrors(['error' => 'No se pudo autenticar al usuario.']);
    }

    
        // Redirige al dashboard
        return redirect()->intended(route('dashboard', absolute: false));
        
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
