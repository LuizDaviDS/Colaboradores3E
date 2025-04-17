@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Colaborador</h1>
    <form action="{{ route('colaboradores.update', $colaborador->id) }}" method="POST">
        
        @csrf
        @method('PUT')
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $colaborador->nome }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $colaborador->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="setor">Setor</label>
            <select name="setor" id="setor" class="form-control" required>
                <option>Selecione um setor:</option>
                @foreach($setores as $setor)
                    <option value="{{ $setor }}" {{ $colaborador->setor == $setor ? 'selected' : '' }}>{{ $setor }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <select name="cidade" id="cidade" class="form-control" required>
                <option>Selecione uma cidade:</option>
                @foreach($cidades as $cidade)
                    <option value="{{ $cidade }}" {{ $colaborador->cidade == $cidade ? 'selected' : '' }}>{{ $cidade }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="checkin">Check-in</label>
            <input type="date" name="checkin" id="checkin" class="form-control" value="{{ $colaborador->checkin }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Editar</button>
        
    </form>
    <a href="{{ route('colaboradores.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
