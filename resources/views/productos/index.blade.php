@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<div id="listado-productos"></div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
@endsection

@section('js')
<script src="{{ mix('js/app.js') }}"></script>
@endsection
