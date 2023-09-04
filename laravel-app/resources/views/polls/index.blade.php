@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if ($polls->isEmpty())
            <!-- Poll Options -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Opções de Propostas
                        </div>
                    </div>
                </div>
            </div>
            <!-- Display message when no active polls are found -->
            <div class="alert alert-warning" style="margin-bottom: 20%;">
                !! Atualmente, não há votações ativas. Por favor, volte mais tarde.
            </div>
        @else
            <!-- Poll Title and Description -->
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4">{{ $polls[0]->title }}</h1>
                    <p class="lead">{{ $polls[0]->description }}</p>
                </div>
            </div>

            <!-- Poll Options -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Opções de Propostas
                        </div>
                        <div class="card-body">
                            @foreach ($polls[0]->options as $option)
                                <div class="mb-3">
                                    <h5>Proposta n.º {{ $option->project_number }}</h5>
                                    <h3>Tema: {{ $option->theme }}</h3>
                                    <p>Descrição: {{ $option->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vote Button -->
            <div class="row mt-4">
                <div class="col-12">
                    @if ($voter && $voter->has_voted)
                        <form action="{{ route('voter.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Já votei, quero sair.</button>
                        </form>
                    @else
                        <a href="{{ route('polls.show', $polls[0]->id) }}" class="btn btn-primary">Continuar para a
                            votação</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
