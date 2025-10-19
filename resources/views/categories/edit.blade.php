<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Usamos la variable $category que nos manda el controlador --}}
            {{ __('Editar Categoría: ') }} {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-xl">

                        <form method="POST" action="{{ route('categories.update', $category->id) }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Descripción:</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-cyan-500 focus:ring-cyan-500">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="icon" class="block text-sm font-medium text-gray-700">Icono (ej: 'fas fa-pizza'):</label>
                                <input type="text" name="icon" id="icon" value="{{ old('icon', $category->icon) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                                @error('icon')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="block">
                                <label for="active" class="inline-flex items-center">
                                    <input id="active" type="checkbox" name="active" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:ring-cyan-500" @if(old('active', $category->active)) checked @endif>
                                    <span class="ml-2 text-sm text-gray-600">Activa</span>
                                </label>
                            </div>

                            {{-- ESTA ES LA SECCIÓN CORREGIDA --}}
                            <div class="flex items-center gap-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Actualizar Categoría
                                </button>
                                <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

