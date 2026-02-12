<x-app-layout>
    <div class="p-8 bg-gray-50 min-h-screen">

        {{-- TÍTULO --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Asignar Tarea</h2>
            <p class="text-gray-500 text-sm">Selecciona los datos para realizar la asignación</p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-sm border max-w-2xl">

            <form action="{{ route('tasks.assign.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- TAREA --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tarea</label>
                    <select name="task_id"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @foreach($tasks as $task)
                            <option value="{{ $task->id }}">
                                {{ $task->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- PROYECTO --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Proyecto</label>
                    <select name="project_id"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- BOTÓN --}}
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow-sm transition">
                        Asignar
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>
