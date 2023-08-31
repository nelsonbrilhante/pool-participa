@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Adicionar proposta</h1>
        <form action="{{ route('admin.addOption', ['poll' => $poll->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="project_number" class="form-label">N.º da proposta</label>
                <input type="number" class="form-control" id="project_number" name="project_number" required>
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Nome do Proponente</label>
                <input type="text" class="form-control" id="owner" name="owner" required>
            </div>
            <div class="mb-3">
                <label for="theme" class="form-label">Tema da Proposta</label>
                <input type="text" class="form-control" id="theme" name="theme" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" rows="13" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Valor imputado (em euros)</label>
                <input type="text" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
@endsection
