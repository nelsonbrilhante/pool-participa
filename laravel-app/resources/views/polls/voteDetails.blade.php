@extends('layouts.app')

@section('content')
    <div class="container mt-4" style="padding-bottom: 10%;">
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
                        <p>Tema: {{ $voter_choice->description }}</p>
                        <p>Proponente: {{ $voter_choice->owner }}</p>
                        <p>Montante: {{ $voter_choice->amount }}</p>
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
