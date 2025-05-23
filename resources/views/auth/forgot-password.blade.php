<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="CORREO" :value="__('CORREO ELECTRONICO')" />
            <x-text-input id="CORREO" class="block mt-1 w-full" type="email" name="CORREO" :value="old('CORREO')" required autofocus />
            <x-input-error :messages="$errors->get('CORREO')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Enlace de restablecimiento de contraseña por correo electrónico') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
