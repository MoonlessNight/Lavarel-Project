<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('subcategorias.index', compact('subcategorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:subcategorias',
            'categoria_id' => 'required|exists:categorias,id'
        ]);
        
        Subcategoria::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria creada exitosamente');
    }

    public function show(string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        return view('subcategorias.show', compact('subcategoria'));
    }

    public function edit(string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $categorias = Categoria::all();
        return view('subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $request->validate([
            'nombre' => 'required|string|max:255|unique:subcategorias,nombre,' . $subcategoria->id,
            'categoria_id' => 'required|exists:categorias,id'
        ]);
        $subcategoria->update($request->all());
        
        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria actualizada exitosamente');
    }

    public function destroy(string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->delete();
        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria eliminada exitosamente');
    }
}
