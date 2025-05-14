@extends('layouts.app')

@section('title', 'Detalle del Usuario')

@section('content')
<div id="show-usuario" data-user-id="{{ $id }}"></div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
@endsection

@section('js')
<script src="{{ mix('js/app.js') }}"></script>
@endsection
