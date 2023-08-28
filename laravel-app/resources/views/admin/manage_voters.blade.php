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

        <!-- Voter Statistics -->
        <div class="mb-3">
            <strong>Total de eleitores:</strong> {{ $totalVoters }}
            @foreach ($regionCounts as $region => $count)
                | <strong>{{ $region }}:</strong> {{ $count }}
            @endforeach
        </div>

        <!-- Search Input -->
        <div class="mb-3">
            <label for="search-input" class="form-label">Pesquisar</label>
            <input type="text" class="form-control" id="search-input" placeholder="Pesquisar por ID, nome ou região..."
                onkeyup="fetchFilteredVoters()">
        </div>

        <!-- Region Filter -->
        <div class="mb-3">
            <label for="region-filter" class="form-label">Filtrar por Freguesia</label>
            <select class="form-control" id="region-filter" onchange="fetchFilteredVoters()">
                <option value="">Todas as freguesias</option>
                @foreach ($regions as $region)
                    <option value="{{ $region }}">{{ $region }}</option>
                @endforeach
            </select>
        </div>


        <div class="card">
            <div class="card-header">Lista de eleitores</div>
            <div class="card-body">
                <div class="table-responsive" id="voters-table">
                    <!-- Table content will be loaded here dynamically -->
                    @include('voter.partials.voters_table', ['voters' => $voters])

                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchFilteredVoters() {
            let query = document.getElementById('search-input').value;
            let region = document.getElementById('region-filter').value;

            if (query.length >= 3) {
                fetch(`/admin/voters/search?query=${query}&region=${region}`)

                    .then(response => {
                        if (!response.ok) {
                            console.error("Error fetching data:", response.statusText); // Debugging line
                        }
                        return response.text();
                    })
                    .then(data => {
                        document.getElementById('voters-table').innerHTML = data;
                    })
                    .catch(error => {
                        console.error("AJAX Error:", error); // Debugging line
                    });
            } else if (query.length == 0) {
                // If the search field is cleared, fetch all voters again
                fetch(`/admin/voters/search?query=${query}&region=${region}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('voters-table').innerHTML = data;
                    });
            }
        }
    </script>
@endsection
