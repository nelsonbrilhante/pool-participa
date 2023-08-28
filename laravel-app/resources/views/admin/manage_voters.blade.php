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

        <!-- Search Input -->
        <div class="mb-3">
            <input type="text" class="form-control" id="search-input" placeholder="Pesquisar por ID, nome ou região..."
                onkeyup="fetchFilteredVoters()">
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

    console.log("Search query:", query); // Debugging line

    if (query.length >= 3) {
        fetch(`/admin/voters/search?query=${query}`)
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
    } else if(query.length == 0) {
        // If the search field is cleared, fetch all voters again
        fetch(`/admin/voters/search?query=`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('voters-table').innerHTML = data;
            });
    }
}

    </script>
@endsection
