<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $countries = DB::connection('pgsql')
            ->table('event_management.countries')
            ->when($search, function ($query, $search) {
                return $query->where('country_name', 'ILIKE', "%{$search}%");
            })
            ->orderBy('country_name')
            ->paginate(3);

        return view('countries.index', compact('countries', 'search'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|string|size:2',
            'country_name' => 'required|string|max:100',
            'phone_code' => 'nullable|string|max:5',
            'is_active' => 'nullable|boolean',
        ]);

        $exists = DB::connection('pgsql')
            ->table('event_management.countries')
            ->where('country_id', $request->country_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['country_id' => 'El ID del país ya existe.'])->withInput();
        }

        DB::connection('pgsql')
            ->table('event_management.countries')
            ->insert([
                'country_id' => strtoupper($request->country_id), // ejemplo: 'BO'
                'country_name' => $request->country_name,
                'phone_code' => $request->phone_code,
                'is_active' => $request->has('is_active') ? $request->is_active : false,
            ]);

        return redirect()->route('countries.index')->with('success', 'País creado correctamente.');
    }


    public function edit($id)
    {
        $country = DB::connection('pgsql')
            ->table('event_management.countries')
            ->where('country_id', $id)
            ->first();

        if (!$country) {
            abort(404, 'País no encontrado');
        }

        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'country_name' => 'required|string|max:100',
            'phone_code' => 'nullable|string|max:5',
            'is_active' => 'nullable|boolean',
        ]);

        $updated = DB::connection('pgsql')
            ->table('event_management.countries')
            ->where('country_id', $id)
            ->update([
                'country_name' => $request->country_name,
                'phone_code' => $request->phone_code,
                'is_active' => $request->has('is_active') ? $request->is_active : false,
            ]);

        if (!$updated) {
            abort(404, 'No se pudo actualizar el país.');
        }

        return redirect()->route('countries.index')->with('success', 'País actualizado correctamente.');
    }

    public function destroy($id)
    {
        $deleted = DB::connection('pgsql')
            ->table('event_management.countries')
            ->where('country_id', $id)
            ->delete();

        if (!$deleted) {
            abort(404, 'No se pudo eliminar el país.');
        }

        return redirect()->route('countries.index')->with('success', 'País eliminado correctamente.');
    }
}
