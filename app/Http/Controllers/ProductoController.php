<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return response()->json($productos);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_barras' => 'required|unique:productos,codigo_barras|max:100',
            'nombre' => 'required|max:150',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('productos', 'public');
        }

        $producto = Producto::create($data);

        return response()->json($producto, 201);
    }

    public function edit($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        $categorias = Categoria::all();

        return response()->json(['producto' => $producto, 'categorias' => $categorias]);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'codigo_barras' => 'required|unique:productos,codigo_barras,' . $producto->id . '|max:100',
            'nombre' => 'required|max:150',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($producto->foto) {
                Storage::delete('public/' . $producto->foto);
            }
            $data['foto'] = $request->file('foto')->store('productos', 'public');
        }

        $producto->update($data);

        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->foto) {
            Storage::delete('public/' . $producto->foto);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado con éxito.']);
    }
}
