<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="NOMBRE" :value="__('Name')" />
            <x-text-input id="NOMBRE" class="block mt-1 w-full" type="text" name="NOMBRE" :value="old('NOMBRE')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('NOMBRE')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for="APELLIDO" :value="__('Surname')" />
            <x-text-input id="APELLIDO" class="block mt-1 w-full" type="text" name="APELLIDO" :value="old('APELLIDO')"
                required autocomplete="surname" />
            <x-input-error :messages="$errors->get('APELLIDO')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electronico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->

        <div class="mt-4">
            <x-input-label for="TELEFONO" :value="__('Phone')" />
            <x-text-input id="TELEFONO" class="block mt-1 w-full" type="text" name="TELEFONO" :value="old('TELEFONO')"
                required />
            <x-input-error :messages="$errors->get('TELEFONO')" class="mt-2" />
        </div>


        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="FECHA_NACIMIENTO" :value="__('Date of Birth')" />
            <x-text-input id="FECHA_NACIMIENTO" class="block mt-1 w-full" type="date" name="FECHA_NACIMIENTO"
                :value="old('FECHA_NACIMIENTO')" required />
            <x-input-error :messages="$errors->get('FECHA_NACIMIENTO')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

      <!-- Confirm Password -->
<div class="mt-4" hidden>
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
        name="password_confirmation" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#password').on('input', function () {
            console.log('Contraseña ingresada:', $(this).val());
            $('#password_confirmation').val($(this).val());
        });
    });
</script>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>