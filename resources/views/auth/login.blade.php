<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-6">

        <div class="w-full max-w-md">

            {{-- LOGO / TÍTULO --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">
                    Gestión de Tareas
                </h1>
                <p class="text-gray-500 text-sm mt-2">
                    Inicia sesión para continuar
                </p>
            </div>

            {{-- CARD --}}
            <div class="bg-white p-8 rounded-xl shadow-sm border">

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input type="email" name="email"
                               value="{{ old('email') }}"
                               required autofocus
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Contraseña
                        </label>
                        <input type="password" name="password"
                               required
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember --}}
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-600">Recordarme</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-indigo-600 hover:underline">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    {{-- BOTÓN --}}
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg shadow-sm transition">
                        Iniciar Sesión
                    </button>

                </form>
            </div>

        </div>

    </div>
</x-guest-layout>
