<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $cities = DB::connection('pgsql')
            ->table('event_management.cities as c')
            ->leftJoin('event_management.states as s', 'c.state_id', '=', 's.state_id')
            ->select('c.*', 's.state_name')
            ->orderBy('c.city_name')
            ->get();

        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        $states = DB::connection('pgsql')->table('event_management.states')->orderBy('state_name')->get();
        return view('cities.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|integer',
            'state_id' => 'nullable|integer',
            'city_name' => 'required|max:100',
            'postal_code' => 'nullable|max:20',
            'is_active' => 'boolean',
        ]);

        $exists = DB::connection('pgsql')->table('event_management.cities')
            ->where('city_id', $request->city_id)->exists();

        if ($exists) {
            return back()->withErrors(['city_id' => 'El ID de ciudad ya existe.'])->withInput();
        }

        DB::connection('pgsql')->table('event_management.cities')->insert([
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
            'is_active' => $request->has('is_active') ? $request->is_active : true,
        ]);

        return redirect()->route('cities.index')->with('success', 'Ciudad creada correctamente.');
    }

    public function edit($id)
    {
        $city = DB::connection('pgsql')->table('event_management.cities')->where('city_id', $id)->first();
        $states = DB::connection('pgsql')->table('event_management.states')->orderBy('state_name')->get();

        if (!$city) {
            abort(404);
        }

        return view('cities.edit', compact('city', 'states'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state_id' => 'nullable|integer',
            'city_name' => 'required|max:100',
            'postal_code' => 'nullable|max:20',
            'is_active' => 'boolean',
        ]);

        DB::connection('pgsql')->table('event_management.cities')->where('city_id', $id)->update([
            'state_id' => $request->state_id,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
            'is_active' => $request->has('is_active') ? $request->is_active : false,
        ]);

        return redirect()->route('cities.index')->with('success', 'Ciudad actualizada correctamente.');
    }

    public function destroy($id)
    {
        DB::connection('pgsql')->table('event_management.cities')->where('city_id', $id)->delete();
        return redirect()->route('cities.index')->with('success', 'Ciudad eliminada correctamente.');
    }
}
