@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Consultar votantes</h1>

        <div class="card">
            <div class="card-header">Lista de votantes</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Número de identificação</th>
                                <th>Nome completo</th>
                                <th class="text-center">Mesa de eleitor</th>
                                <th class="text-center">Já votou?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($voters as $voter)
                                <tr>
                                    <td class="text-center">{{ $voter->id_number }}</td>
                                    <td>{{ $voter->name }}</td>
                                    <td class="text-center">{{ $voter->table }}</td>
                                    <td class="text-center">{{ $voter->has_voted ? 'Sim' : 'Não' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
