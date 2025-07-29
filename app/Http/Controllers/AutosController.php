<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class AutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autos = DB::table('autos')
            ->join('categorias', 'autos.categoria_id', '=', 'categorias.id')
            ->select(
                'autos.id',
                'autos.nombre',
                'autos.descripcion',
                'autos.marca',
                'autos.modelo',
                'autos.categoria_id',
                'categorias.nombre AS categoria_nombre'
            )
            ->get();
        return view('autos/index', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $categorias = Categoria::all();
            return view('autos.create', compact('categorias'));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al cargar las categorías: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $auto = new Auto();
            $auto->nombre = $request->input('nombre');
            $auto->descripcion = $request->input('descripcion');
            $auto->marca = $request->input('marca');
            $auto->modelo = $request->input('modelo');
            $auto->categoria_id = $request->input('categoria_id');
            $auto->save();

            return redirect()->route('autos.index')->with('success', 'Auto creado exitosamente.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el auto: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $auto = Auto::findOrFail($id);
            $categorias = Categoria::all();
            return view('autos/edit', compact('auto', 'categorias'));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Auto no encontrado.'], 404);
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
            $auto = Auto::findOrFail($id);
            $auto->nombre = $request->input('nombre');
            $auto->descripcion = $request->input('descripcion');
            $auto->marca = $request->input('marca');
            $auto->modelo = $request->input('modelo');
            $auto->categoria_id = $request->input('categoria_id');
            $auto->save();

            return redirect()->route('autos.index')->with('success', 'Auto actualizado exitosamente.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar el auto: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $auto = Auto::findOrFail($id);
            $auto->delete();
            // Redirige con un mensaje de éxito
            return redirect()->route('autos.index')->with('success', 'Auto eliminado exitosamente.');
        } catch (\Exception $e) {
            // Redirige con un mensaje de error
            return redirect()->route('autos.index')->with('error', 'Error al eliminar el auto: ' . $e->getMessage());
        }
    }
}
