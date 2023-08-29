@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Importar Caderno Eleitoral</h1>
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
                <form action="{{ route('import-voters') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="csv_file" class="form-label">Carregar ficheiro CSV</label>
                        <input type="file" class="form-control" id="csv_file" name="csv_file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Importar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
