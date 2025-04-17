@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Colaboradores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Setor</th>
                <th>Cidade</th>
                <th>Check-in</th>
                <th>Edição</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->id }} </td>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->setor }}</td>
                    <td>{{ $colaborador->cidade }}</td>
                    <td>{{ $colaborador->checkin }}</td>
                    <td><a href="{{ route('colaboradores.edit', ['colaborador' => $colaborador->id]) }}">Editar</a></td>
                    <td><a href="{{ route('colaboradores.destroy', ['colaborador' => $colaborador->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $colaborador->id }}').submit();">Excluir</a></td>
                    
                    <form id="delete-form-{{ $colaborador->id }}" action="{{ route('colaboradores.destroy', ['colaborador' => $colaborador->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('colaboradores.create') }}" class="btn btn-primary">Adicionar Colaborador</a>
</div>
@endsection