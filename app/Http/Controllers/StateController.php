<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    public function index()
    {
        $states = DB::connection('pgsql')
            ->table('event_management.states')
            ->orderBy('state_name')
            ->get();

        return view('states.index', compact('states'));
    }

    public function create()
    {
        $countries = DB::connection('pgsql')->table('event_management.countries')->orderBy('country_name')->get();
        return view('states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|integer',
            'country_id' => 'required|max:2',
            'state_name' => 'required|max:100',
            'state_code' => 'nullable|max:10',
        ]);

        $exists = DB::connection('pgsql')
            ->table('event_management.states')
            ->where('state_id', $request->state_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['state_id' => 'El ID del estado ya existe.'])->withInput();
        }

        DB::connection('pgsql')
            ->table('event_management.states')
            ->insert([
                'state_id' => $request->state_id,
                'country_id' => $request->country_id,
                'state_name' => $request->state_name,
                'state_code' => $request->state_code,
            ]);

        return redirect()->route('states.index')->with('success', 'Estado creado correctamente.');
    }

    public function edit($id)
    {
        $state = DB::connection('pgsql')
            ->table('event_management.states')
            ->where('state_id', $id)
            ->first();

        if (!$state) {
            abort(404);
        }

        $countries = DB::connection('pgsql')->table('event_management.countries')->orderBy('country_name')->get();

        return view('states.edit', compact('state', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'country_id' => 'required|max:2',
            'state_name' => 'required|max:100',
            'state_code' => 'nullable|max:10',
        ]);

        DB::connection('pgsql')
            ->table('event_management.states')
            ->where('state_id', $id)
            ->update([
                'country_id' => $request->country_id,
                'state_name' => $request->state_name,
                'state_code' => $request->state_code,
            ]);

        return redirect()->route('states.index')->with('success', 'Estado actualizado correctamente.');
    }

    public function destroy($id)
    {
        DB::connection('pgsql')
            ->table('event_management.states')
            ->where('state_id', $id)
            ->delete();

        return redirect()->route('states.index')->with('success', 'Estado eliminado correctamente.');
    }
}
