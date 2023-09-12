@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <h1>Importar Caderno Eleitoral</h1>
            </div>
        </div>

        <!-- Success and Error Alerts -->
        <div class="row mt-3">
            <div class="col-12">
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
            </div>
        </div>

        <!-- Form -->
        <div class="row mt-3">
            <div class="col-12">
                <form action="{{ route('import-voters') }}" method="POST" enctype="multipart/form-data"
                    id="csv-import-form">
                    @csrf
                    <div class="mb-3">
                        <label for="csv_file" class="form-label">Carregar ficheiro CSV</label>
                        <input type="file" class="form-control" id="csv_file" name="csv_file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Importar</button>
                </form>
            </div>
        </div>

        <!-- Loading Modal -->
        <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loadingModalLabel">A importar eleitores...</h5>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Carregando...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('csv-import-form').addEventListener('submit', function(e) {
                e.preventDefault();

                // Create a new instance of the modal
                var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
                // Show the loading modal
                loadingModal.show();

                // Submit the form using Fetch API
                fetch(this.action, {
                        method: 'POST',
                        body: new FormData(this)
                    })
                    .then(response => {
                        if (response.redirected) {
                            window.location.href = response.url; // Redirect the browser to the new URL
                            return;
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            loadingModal.hide();
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        loadingModal.hide();
                        alert('Ocorreu um erro ao importar o arquivo CSV.');
                    });
            });
        </script>

    </div>
@endsection
