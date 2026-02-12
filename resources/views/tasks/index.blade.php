<x-app-layout>
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Tareas</h2>
                <p class="text-gray-500 text-sm">Listado de tareas registradas</p>
            </div>

            <a href="{{ route('tasks.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-sm transition">
                + Nueva Tarea
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Proyecto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Horas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @foreach($tasks as $task)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $task->project->name ?? '-' }}</td>
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $task->title }}</td>
                            <td class="px-6 py-4">{{ $task->hours }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="#" class="text-indigo-600 hover:underline">Editar</a>
                                <a href="#" class="text-red-600 hover:underline">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
