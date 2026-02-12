<x-app-layout>
    <div class="p-8 bg-gray-50 min-h-screen">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Nuevo Proyecto</h2>
            <p class="text-gray-500 text-sm">Crea un nuevo proyecto</p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-sm border max-w-2xl">

            <form action="{{ route('projects.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Nombre del Proyecto
                    </label>
                    <input type="text" name="name"
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Tu tarifa en este proyecto
                    </label>
                    <input type="number" step="0.01" name="rate"
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm">
                </div>


                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow-sm transition">
                        Guardar Proyecto
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>
