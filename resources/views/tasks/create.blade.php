<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-6 bg-gray-50 min-h-screen rounded-lg shadow-sm">

        <h2 class="text-2xl font-bold mb-6">Crear Tarea</h2>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" required
                       class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description"
                          class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Proyecto</label>
                <select name="project_id" required
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Selecciona un proyecto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Horas</label>
                <input type="number" name="hours" step="0.1" required
                       class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow-sm transition">
                    Guardar Tarea
                </button>
            </div>

        </form>

    </div>
</x-app-layout>
