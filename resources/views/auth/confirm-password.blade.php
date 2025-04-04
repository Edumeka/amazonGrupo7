<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="CONTRASENIA" :value="__('CONTRASEÑA')" />

            <x-text-input id="CONTRASENIA" class="block mt-1 w-full"
                            type="password"
                            name="CONTRASENIA"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('CONTRASENIA')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirmar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
