@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Estatística da votação</h1>

        @foreach ($polls as $poll)
            <div class="card mb-4">
                <div class="card-header">{{ $poll->title }} | Resultados</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">N.º</th>
                                    <th>Tema</th>
                                    <th class="text-center">Montante imputado</th>
                                    <th class="text-center">Contagem de votos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poll->options as $option)
                                    <tr>
                                        <td class="text-center">{{ $option->project_number }}</td>
                                        <td>{{ $option->theme }}</td>
                                        <td class="text-center">€{{ number_format($option->amount, 2) }}</td>
                                        <td class="text-center"><span
                                                class="badge bg-primary">{{ $option->vote_count }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
