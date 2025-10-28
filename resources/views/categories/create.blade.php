<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Título de la sección --}}
            {{ __('Crear Nueva Categoría') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Mostramos errores de validación si existen --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">¡Ups!</strong>
                            <span class="block sm:inline">Hubo algunos problemas con tus datos.</span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- FORMULARIO --}}
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf  {{-- Token de seguridad obligatorio --}}

                        {{-- Campo Nombre --}}
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        {{-- Campo Descripción --}}
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                            <textarea name="description" id="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
                        </div>

                        {{-- Campo Icono (opcional) --}}
                        <div class="mb-4">
                            <label for="icon" class="block text-gray-700 text-sm font-bold mb-2">Icono (ej: 'fas fa-pizza'):</label>
                            <input type="text" name="icon" id="icon" value="{{ old('icon') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        {{-- Checkbox Activo --}}
                        <div class="mb-4">
                            <label for="active" class="inline-flex items-center">
                                <input type="checkbox" name="active" id="active" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:ring-cyan-500" checked>
                                <span class="ml-2 text-sm text-gray-600">Activa</span>
                            </label>
                        </div>
                        
                        {{-- Botones de acción --}}
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Guardar Categoría
                            </button>
                            <a href="{{ route('categories.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                                Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
