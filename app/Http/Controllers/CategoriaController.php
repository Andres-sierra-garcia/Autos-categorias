<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categoria = new Categoria();
            $categoria->nombre = $request->input('nombre'); 
            $categoria->descripcion = $request->input('descripcion'); 
            $categoria->save();

            return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear la categoría: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            return view('categorias/edit', compact('categoria')); // Pasa la categoría a la vista de edición
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Categoría no encontrada.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->nombre = $request->input('nombre'); 
            $categoria->descripcion = $request->input('descripcion'); 
            $categoria->save();

            return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar la categoría: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'Categoria eliminada exitosamente.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar la categoría: ' . $e->getMessage()], 500);
        }
    }
}
