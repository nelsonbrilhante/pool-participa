<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Número de identificação</th>
                <th>Nome completo</th>
                <th class="text-center">Freguesia</th>
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
                    <td class="text-center">{{ $voter->region }}</td>
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
