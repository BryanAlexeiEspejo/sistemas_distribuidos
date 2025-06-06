<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        // Obtener los eventos desde la tabla event_management.events usando PostgreSQL
        $events = DB::connection('pgsql')
            ->table('event_management.events')
            ->orderBy('start_datetime', 'asc')
            ->get();

        // Pasamos los eventos a la vista
        return view('events.index', compact('events'));
    }
}
