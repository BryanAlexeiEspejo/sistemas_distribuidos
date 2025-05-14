<?php

namespace App\Http\Controllers;

use App\Models\ControlEntradaSalida;
use Illuminate\Http\Request;

class ControlEntradaSalidaController extends Controller
{
    public function index()
    {
        // Obtener todas las entradas y salidas, ordenadas por fecha más reciente
        $entradasSalidas = ControlEntradaSalida::orderBy('fecha_hora', 'desc')->get();

        // Retornar la vista con los datos
        return view('control_entradas_salidas.index', compact('entradasSalidas'));
    }
}
