<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventTypeController extends Controller
{
    public function index()
    {
        $eventTypes = DB::connection('pgsql')
            ->table('event_management.event_types')
            ->orderBy('type_name')
            ->get();

        return view('event_types.index', compact('eventTypes'));
    }

    public function create()
    {
        return view('event_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_type_id' => 'required|integer',
            'type_name' => 'required|max:100',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $exists = DB::connection('pgsql')
            ->table('event_management.event_types')
            ->where('event_type_id', $request->event_type_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['event_type_id' => 'El ID del tipo de evento ya existe.'])->withInput();
        }

        DB::connection('pgsql')
            ->table('event_management.event_types')
            ->insert([
                'event_type_id' => $request->event_type_id,
                'type_name' => $request->type_name,
                'description' => $request->description,
                'is_active' => $request->has('is_active') ? $request->is_active : false,
                'created_by' => auth()->user()->name ?? 'admin',
                'updated_by' => auth()->user()->name ?? 'admin',
            ]);

        return redirect()->route('event_types.index')->with('success', 'Tipo de evento creado correctamente.');
    }

    public function edit($id)
    {
        $eventType = DB::connection('pgsql')
            ->table('event_management.event_types')
            ->where('event_type_id', $id)
            ->first();

        if (!$eventType) {
            abort(404);
        }

        return view('event_types.edit', compact('eventType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|max:100',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        DB::connection('pgsql')
            ->table('event_management.event_types')
            ->where('event_type_id', $id)
            ->update([
                'type_name' => $request->type_name,
                'description' => $request->description,
                'is_active' => $request->has('is_active') ? $request->is_active : false,
                'updated_by' => auth()->user()->name ?? 'admin',
                'updated_at' => now(),
            ]);

        return redirect()->route('event_types.index')->with('success', 'Tipo de evento actualizado correctamente.');
    }

    public function destroy($id)
    {
        DB::connection('pgsql')
            ->table('event_management.event_types')
            ->where('event_type_id', $id)
            ->delete();

        return redirect()->route('event_types.index')->with('success', 'Tipo de evento eliminado correctamente.');
    }
}
