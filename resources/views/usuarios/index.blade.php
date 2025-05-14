@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div id="list-usuarios"></div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
@endsection

@section('js')
<script src="{{ mix('js/app.js') }}"></script>
@endsection
