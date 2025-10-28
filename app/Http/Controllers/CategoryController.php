<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra una lista de todas las categorías.
     */
    public function index()
    {
        // 1. Obtiene TODAS las categorías de la base de datos
        $categories = Category::all();

        // 2. Muestra la vista 'index' y le pasa la lista de categorías
        // (Crearemos esta vista en el siguiente paso)
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     */
    public function create()
    {
        // Solo muestra el formulario de creación
        // (También crearemos esta vista)
        return view('categories.create');
    }

    /**
     * Guarda la nueva categoría en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validación: Asegura que los datos son correctos
        // Tu migración tenía: name, description, icon, active
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        // 2. Creación: Crea una nueva categoría con los datos validados
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->icon = $request->icon;
        $category->active = $request->has('active'); // Si el checkbox 'active' está marcado, será true
        $category->save();

        // 3. Redirección: Envía al usuario de vuelta al listado con un mensaje de éxito.
        return redirect()->route('categories.index')->with('status', '¡Categoría creada exitosamente!');
    }

    /**
     * Muestra el formulario para editar una categoría existente.
     * Laravel automáticamente encuentra la categoría por su ID gracias al "Route-Model Binding".
     */
    public function edit(Category $category)
    {
        // Muestra la vista 'edit' y le pasa la categoría que queremos editar
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Actualiza la categoría en la base de datos.
     */
    public function update(Request $request, Category $category)
    {
        // 1. Validación: Similar a 'store', pero permite que el nombre sea el mismo
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        // 2. Actualización: Actualiza los datos de la categoría
        $category->name = $request->name;
        $category->description = $request->description;
        $category->icon = $request->icon;
        $category->active = $request->has('active');
        $category->save();

        // 3. Redirección: Envía al usuario de vuelta con un mensaje.
        return redirect()->route('categories.index')->with('status', '¡Categoría actualizada exitosamente!');
    }

    /**
     * Elimina una categoría de la base de datos.
     */
    public function destroy(Category $category)
    {
        // 1. Eliminación: Borra la categoría de la base de datos
        $category->delete();

        // 2. Redirección: Envía al usuario de vuelta con un mensaje.
        return redirect()->route('categories.index')->with('status', 'Categoría eliminada exitosamente.');
    }
}
