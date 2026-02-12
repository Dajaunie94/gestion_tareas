<x-app-layout>
    <div class="p-8 bg-gray-50 min-h-screen">

        {{-- TÍTULO --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Mis Tareas</h2>
            <p class="text-gray-500 text-sm">Resumen general de tus actividades</p>
        </div>

        {{-- MÉTRICAS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-sm text-gray-500">Total Tareas</p>
                <h3 class="text-2xl font-bold text-indigo-600">
                    {{ $tasks->count() }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-sm text-gray-500">Horas Totales</p>
                <h3 class="text-2xl font-bold text-green-600">
                    {{ $tasks->sum('hours') }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-sm text-gray-500">Total General</p>
                <h3 class="text-2xl font-bold text-gray-800">
                    ${{ $totalGeneral }}
                </h3>
            </div>

        </div>

        {{-- TABLA --}}
        @if($tasks->isEmpty())
            <div class="bg-white p-6 rounded-xl shadow-sm border text-center text-gray-500">
                No tienes tareas registradas.
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Proyecto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Tarea</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Horas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Tarifa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Total</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach($tasks as $task)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    {{ $task->project->name ?? '-' }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $task->title }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $task->hours }}
                                </td>

                                <td class="px-6 py-4 text-green-600 font-semibold">
                                    ${{ $task->rate ?? 0 }}
                                </td>

                                <td class="px-6 py-4 font-bold text-gray-800">
                                    ${{ $task->total ?? 0 }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @endif

    </div>
</x-app-layout>

