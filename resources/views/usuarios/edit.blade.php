@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div id="editar-usuario" data-user-id="{{ $id }}"></div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
@endsection

@section('js')
<script src="{{ mix('js/app.js') }}"></script>
@endsection
