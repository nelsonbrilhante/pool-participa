@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Criar nova votação</h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Detalhes da votação</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.createPoll') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título da votação</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição (Opcional)</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Estado da votação</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="active">Ativa</option>
                            <option value="inactive">Inativa</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Criar votação</button>
                </form>
            </div>
        </div>
    </div>
@endsection
