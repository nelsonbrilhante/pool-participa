@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Proposta</h1>

        <form action="{{ route('options.update', $option->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 mt-4">
                <label for="project_number" class="form-label">N.º</label>
                <input type="text" class="form-control" id="project_number" name="project_number" value="{{ $option->project_number }}" required>
            </div>

            <div class="mb-3">
                <label for="owner" class="form-label">Preponente</label>
                <input type="text" class="form-control" id="owner" name="owner" value="{{ $option->owner }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="13" required>{{ $option->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Montante imputado</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{ $option->amount }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
