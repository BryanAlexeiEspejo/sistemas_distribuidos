<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationTypeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $locationTypes = DB::connection('pgsql')
            ->table('event_management.location_types')
            ->when($search, function ($query, $search) {
                return $query->where('type_name', 'ILIKE', "%{$search}%");
            })
            ->orderBy('type_name')
            ->paginate(5)
            ->withQueryString();

        return view('location_types.index', compact('locationTypes', 'search'));
    }


    public function create()
    {
        return view('location_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location_type_id' => 'required|integer',
            'type_name' => 'required|max:100',
            'description' => 'nullable',
        ]);

        $exists = DB::connection('pgsql')
            ->table('event_management.location_types')
            ->where('location_type_id', $request->location_type_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['location_type_id' => 'El ID ya existe.'])->withInput();
        }

        DB::connection('pgsql')
            ->table('event_management.location_types')
            ->insert([
                'location_type_id' => $request->location_type_id,
                'type_name' => $request->type_name,
                'description' => $request->description,
            ]);

        return redirect()->route('location_types.index')->with('success', 'Tipo de ubicación creado correctamente.');
    }

    public function edit($id)
    {
        $locationType = DB::connection('pgsql')
            ->table('event_management.location_types')
            ->where('location_type_id', $id)
            ->first();

        if (!$locationType) {
            abort(404);
        }

        return view('location_types.edit', compact('locationType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|max:100',
            'description' => 'nullable',
        ]);

        DB::connection('pgsql')
            ->table('event_management.location_types')
            ->where('location_type_id', $id)
            ->update([
                'type_name' => $request->type_name,
                'description' => $request->description,
            ]);

        return redirect()->route('location_types.index')->with('success', 'Tipo de ubicación actualizado correctamente.');
    }

    public function destroy($id)
    {
        DB::connection('pgsql')
            ->table('event_management.location_types')
            ->where('location_type_id', $id)
            ->delete();

        return redirect()->route('location_types.index')->with('success', 'Tipo de ubicación eliminado correctamente.');
    }
}
