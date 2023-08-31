@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Escolha uma proposta
    </h2>
    <form action="{{ route('polls.vote', $poll->id) }}" method="POST">
        @csrf
        @foreach($poll->options as $option)
        <div class="card mb-4">
            <div class="card-header">
                Proposta {{ $option->project_number }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $option->theme }}</h5>
                <p class="card-text">
                    <strong>Proponente:</strong> {{ $option->owner }}<br>
                    <strong>Descrição:</strong> {{ $option->description }}<br>
                    <strong>Montante Imputado:</strong> €{{ number_format($option->amount, 2) }}
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option_id" id="option_{{ $option->id }}" value="{{ $option->id }}">
                    <label class="form-check-label" for="option_{{ $option->id }}">
                        Escolher esta proposta
                    </label>
                </div>
            </div>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary mt-3">Submeter voto</button>
    </form>
</div>
@endsection
