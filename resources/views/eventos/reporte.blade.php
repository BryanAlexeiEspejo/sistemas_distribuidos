@extends('layouts.app')


<br>
<br>
@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">📊 Reporte de Eventos</h1>
        <pre class="bg-gray-100 p-4 rounded text-sm">
            {{ print_r($reporte, true) }}
        </pre>
    </div>
@endsection
