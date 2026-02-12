<x-app-layout>
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Proyectos</h2>

            <a href="{{ route('projects.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-sm">
                + Nuevo Proyecto
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @foreach($projects as $project)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">{{ $project->name }}</td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-indigo-600 hover:underline">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
