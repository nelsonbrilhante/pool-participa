@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Estatística da votação</h1>

        @foreach ($polls as $poll)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $poll->title }} | Resultados
                    @php
                        $votePercentage = $totalVoters > 0 ? (($totalVotesPerPoll[$poll->id] ?? 0) / $totalVoters) * 100 : 0;
                    @endphp
                    <span class="badge bg-success float-end">Total de votos: {{ $totalVotesPerPoll[$poll->id] ?? 0 }}
                        ({{ number_format($votePercentage, 2) }}%)
                    </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">N.º</th>
                                    <th>Tema</th>
                                    <th class="text-center">Montante imputado</th>
                                    <th class="text-center">Contagem de votos</th>
                                    <th class="text-center">Percentagem de votos</th>
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
                                        <td class="text-center">
                                            {{ number_format($votePercentagesPerPoll[$option->id], 2) }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 row">
                        <div class="col-md-6">
                            <h5>Votos por Opção e Região</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">N.º</th>
                                            <th>Tema</th>
                                            <th>Famalicão</th>
                                            <th>Nazaré</th>
                                            <th>Valado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($poll->options->sortBy('project_number') as $option)
                                            <tr>
                                                <td class="text-center">{{ $option->project_number }}</td>
                                                <td>{{ $option->theme }}</td>
                                                <td class="text-center">
                                                    {{ $votesPerOptionPerRegion[$option->id]['Famalicão'] ?? 0 }}</td>
                                                <td class="text-center">
                                                    {{ $votesPerOptionPerRegion[$option->id]['Nazaré'] ?? 0 }}</td>
                                                <td class="text-center">
                                                    {{ $votesPerOptionPerRegion[$option->id]['Valado dos Frades'] ?? 0 }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Votos por Região</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Região</th>
                                            <th class="text-center">Número de Votos</th>
                                            <th class="text-center">% de votos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($votesPerRegion[$poll->id] ?? [] as $region => $voteCount)
                                            @php
                                                $totalVotersInRegion = \App\Models\Voter::where('region', $region)->count();
                                                $votePercentagePerRegion = $totalVotersInRegion > 0 ? ($voteCount / $totalVotersInRegion) * 100 : 0;
                                            @endphp
                                            <tr>
                                                <td>{{ $region }}</td>
                                                <td class="text-center">{{ $voteCount }}</td>
                                                <td class="text-center">{{ number_format($votePercentagePerRegion, 2) }}%
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
