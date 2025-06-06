<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventStatusController extends Controller
{
    public function index()
    {
        $statuses = DB::connection('pgsql')
            ->table('event_management.event_statuses')
            ->orderBy('status_name')
            ->get();

        return view('event_statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('event_statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_id' => 'required|integer',
            'status_name' => 'required|max:100',
            'description' => 'nullable|max:255',
            // quitar validación estricta de boolean
            // 'is_system' => 'boolean',
        ]);

        $exists = DB::connection('pgsql')
            ->table('event_management.event_statuses')
            ->where('status_id', $request->status_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['status_id' => 'El ID del estado ya existe.'])->withInput();
        }

        DB::connection('pgsql')
            ->table('event_management.event_statuses')
            ->insert([
                'status_id' => $request->status_id,
                'status_name' => $request->status_name,
                'description' => $request->description,
                'is_system' => $request->has('is_system') ? true : false,
            ]);

        return redirect()->route('event_statuses.index')->with('success', 'Estado creado correctamente.');
    }


    public function edit($id)
    {
        $status = DB::connection('pgsql')
            ->table('event_management.event_statuses')
            ->where('status_id', $id)
            ->first();

        if (!$status) {
            abort(404);
        }

        return view('event_statuses.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_name' => 'required|max:100',
            'description' => 'nullable|max:255',
            // quitar validación estricta de boolean
            // 'is_system' => 'boolean',
        ]);

        DB::connection('pgsql')
            ->table('event_management.event_statuses')
            ->where('status_id', $id)
            ->update([
                'status_name' => $request->status_name,
                'description' => $request->description,
                'is_system' => $request->has('is_system') ? true : false,
            ]);

        return redirect()->route('event_statuses.index')->with('success', 'Estado actualizado correctamente.');
    }


    public function destroy($id)
    {
        DB::connection('pgsql')
            ->table('event_management.event_statuses')
            ->where('status_id', $id)
            ->delete();

        return redirect()->route('event_statuses.index')->with('success', 'Estado eliminado correctamente.');
    }
}
