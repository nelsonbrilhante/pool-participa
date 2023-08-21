@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">DASHBOARD</h1>

        @if ($poll)
            <div class="alert alert-info" role="alert">
                Já existe uma votação criada. Somente uma votação é permitida.
            </div>
        @else
            <!-- Create New Poll Section -->
            <div class="card mb-4">
                <div class="card-header">Criar uma votação</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.createPoll') }}">

                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titulo da votação</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição (Opcional)</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Criar votação</button>
                    </form>
                </div>
            </div>
        @endif

        <!-- Current Poll Details and Options -->
        @if ($poll)
            <div class="card mb-4">
                <div class="card-header">Detalhes da votação</div>
                <div class="card-body">
                    <h3>{{ $poll->title }}</h3>
                    <p>{{ $poll->description }}</p>
                    <hr>
                    <h4>Propostas:</h4>
                    <ul>
                        @foreach ($poll->options as $option)
                            <li>
                                <strong>Project Number:</strong> {{ $option->project_number }}<br>
                                <strong>Owner:</strong> {{ $option->owner }}<br>
                                <strong>Theme:</strong> {{ $option->theme }}<br>
                                <strong>Description:</strong> {{ $option->description }}<br>
                                <strong>Amount:</strong> ${{ number_format($option->amount, 2) }}<br>
                                <strong>Votes:</strong> {{ $option->vote_count }}<br>
                                <hr>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </div>
@endsection
