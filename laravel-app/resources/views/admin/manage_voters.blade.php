@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Caderno Eleitoral</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Lista de eleitores</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Número de identificação</th>
                                <th>Nome completo</th>
                                <th class="text-center">Mesa de eleitor</th>
                                <th class="text-center">Já votou?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1 @endphp
                            @forelse ($voters as $voter)
                                <tr>
                                    <td class="text-center">{{ $counter++ }}</td>
                                    <td class="text-center">{{ $voter->id_number }}</td>
                                    <td>{{ $voter->name }}</td>
                                    <td class="text-center">{{ $voter->table }}</td>
                                    <td class="text-center">{{ $voter->has_voted ? 'Sim' : 'Não' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Sem eleitores registados!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
