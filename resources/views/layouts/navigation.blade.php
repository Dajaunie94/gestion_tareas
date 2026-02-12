<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16 items-center">

            {{-- Logo / Nombre --}}
            <div class="flex items-center space-x-8">

                

                {{-- Links principales --}}
                <div class="hidden md:flex space-x-6 text-gray-700">

                    <a href="{{ route('dashboard') }}"
                       class="hover:text-blue-600 transition">
                        Inicio
                    </a>

                    <a href="{{ route('projects.index') }}"
                       class="hover:text-blue-600 transition">
                        Proyectos
                    </a>

                    <a href="{{ route('projects.create') }}"
                       class="hover:text-blue-600 transition">
                        Crear Proyecto
                    </a>

                    <a href="{{ route('tasks.index') }}"
                       class="hover:text-blue-600 transition">
                        Tareas
                    </a>

                    <a href="{{ route('tasks.create') }}"
                       class="hover:text-blue-600 transition">
                        Crear Tarea
                    </a>
                    

                </div>
            </div>

            {{-- Usuario --}}
            <div class="flex items-center space-x-4">

                <span class="text-gray-600">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                        Cerrar sesión
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>
