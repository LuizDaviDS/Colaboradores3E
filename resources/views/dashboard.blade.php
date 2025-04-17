@extends('layouts.app')

@section('content')
@if(!auth()->check())
    <script>
        window.location.href = "{{ route('login.index') }}";
    </script>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h1>Olá, usuário {{ auth()->user()->name }}, <br>Bem vindo a página do dashboard</h1>
                    <br>
                    <h3>Abaixo está a lista de colaboradores, clique no botão para acessar.</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('colaboradores.index') }}"><button class="btn btn-primary btn-block">Lista Colaboradores</button></a>
                        </div>
                </div>

        </div>
    </div>
@endsection