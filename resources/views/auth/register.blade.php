<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="Nombre" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" value="Correo" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                         required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" value="¿Qué tipo de cuenta deseas en DevJobs?" />
                <select name="role" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option disabled selected>--Selecciona un Rol--</option>
                    <option value="1">Desarrollador - Obtener un Empleo</option>
                    <option value="2">Reclutador - Publicar Empleos</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Contraseña" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Repite tu contraseña" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-link :href="route('login')">¿Ya tienes cuenta?</x-link>
            </div>

            <x-button class="mt-4 w-full justify-center">
                Registrarse
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
