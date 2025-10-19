<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Título de la sección --}}
            {{ __('Gestión de Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Botón para ir al formulario de creación --}}
                    <div class="mb-4">
                        <a href="{{ route('categories.create') }}" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded">
                            + Nueva Categoría
                        </a>
                    </div>
                    
                    {{-- Mensaje de éxito después de una operación --}}
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif

                    {{-- Tabla para mostrar las categorías --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">ID</th>
                                    <th class="w-2/6 py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                                    <th class="w-2/6 py-3 px-4 uppercase font-semibold text-sm">Descripción</th>
                                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Estado</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                {{-- Bucle para recorrer los datos --}}
                                @forelse ($categories as $category)
                                    <tr class="border-b">
                                        <td class="py-3 px-4">{{ $category->id }}</td>
                                        <td class="py-3 px-4">{{ $category->name }}</td>
                                        <td class="py-3 px-4">{{ $category->description ?? 'N/A' }}</td>
                                        <td class="py-3 px-4">
                                            @if ($category->active)
                                                <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs">Activa</span>
                                            @else
                                                <span class="bg-red-200 text-red-800 py-1 px-3 rounded-full text-xs">Inactiva</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">
                                            {{-- Botón de Editar --}}
                                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Editar</a>
                                            
                                            {{-- Formulario para Borrar --}}
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?')">
                                                    Borrar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Se muestra si no hay categorías --}}
                                    <tr>
                                        <td colspan="5" class="py-3 px-4 text-center">No hay categorías registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

