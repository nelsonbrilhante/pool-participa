@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Voter's Chosen Option -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-3">Detalhes do seu voto:</h2>
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Proposta Seleccionada
                    </div>
                    <div class="card-body">
                        <h5>Número do Projeto: {{ $voter_choice->project_number }}</h5>
                        <p>Tema: {{ $voter_choice->theme }}</p>
                        <p>Proponente: {{ $voter_choice->owner }}</p>
                        <p>Montante: {{ $voter_choice->amount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Poll Results -->
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3">Resultados Atuais:</h2>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Votação: {{ $poll->title }}
                    </div>
                    <div class="card-body">
                        @foreach ($options as $option)
                            <div class="mb-3">
                                <h5>Número do Projeto: {{ $option->project_number }}</h5>
                                <p>Tema: {{ $option->theme }}</p>
                                <p>Montante: {{ $option->amount }}</p>
                                <p>Votos: <span class="badge bg-secondary">{{ $option->vote_count }}</span></p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('polls.index') }}" class="btn btn-primary">Voltar atrás</a>
            </div>
        </div>
    </div>
@endsection
