@extends('layout')

@section('title', 'Llistat d\'autors')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Llistat d'autors</h1>
<a href="{{ route('autor_new') }}">+ Nou Autor</a>

@if (session('status'))
<div>
    <strong>Success!</strong> {{ session('status') }}
</div>
@endif

<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Imatge</th>
            <th>Quantitat Llibres</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($autors as $autor)
        <tr>
            <td>{{ $autor->nom }}</td>
            <td>{{ $autor->cognoms }}</td>
            <td>{{ $autor->Imatge }}</td>
            <td>{{ count($autor->llibre)}}</td>
            <td>
                <a href="{{ route('autor_delete', ['id' => $autor->id]) }}">Eliminar</a> / <a href="{{ route('autor_edit', ['id' => $autor->id]) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>
@endsection