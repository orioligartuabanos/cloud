@extends('layout')

@section('title', 'Llistat de llibres')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Llistat de llibres</h1>
<a href="{{ route('llibre_new') }}">+ Nou llibre</a>

@if (session('status'))
<div>
    <strong>Success!</strong> {{ session('status') }}
</div>
@endif

<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Títol</th>
            <th>Data de publicació</th>
            <th>Vendes</th>
           

            <th>Autor</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($llibres as $llibre)
        <tr>
            <td>{{ $llibre->titol }}</td>
            <td>{{ date('d-M-y', strtotime($llibre->dataP)) }}</td>
            <td>{{ $llibre->vendes }}</td>
       
            <td>@isset($llibre->autor_id) {{ $llibre->autor->nomCognoms() }} @endisset </td>
            <td>
                <a href="{{ route('llibre_delete', ['id' => $llibre->id]) }}">Eliminar / <a href="{{ route('llibre_edit', ['id' => $llibre->id]) }}">Editar</a></a>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
<div>
            <form method="post" action="{{route('llibre_cerca')}}" >
                @csrf
        <label for="ctitol">Cerca Titol</label>
        <input type="required" name="cerca"></input>
        <label for="ctitol">Minim vendes</label>

        <input type="number" name="num"></input>

        <button type="submit">Cerca</button>
            </form>
        </div>
<br>
@endsection