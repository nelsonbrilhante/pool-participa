@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Poll Option</h2>
    <form action="{{ route('admin.updateOption', ['option' => $option->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="project_number" class="form-label">Proposta N.º</label>
            <input type="number" class="form-control" id="project_number" name="project_number" value="{{ $option->project_number }}" required>
        </div>

        <div class="mb-3">
            <label for="owner" class="form-label">Proponente</label>
            <input type="text" class="form-control" id="owner" name="owner" value="{{ $option->owner }}" required>
        </div>

        <div class="mb-3">
            <label for="theme" class="form-label">Tema</label>
            <input type="text" class="form-control" id="theme" name="theme" value="{{ $option->theme }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description">{{ $option->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Montante Imputado</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ $option->amount }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar proposta</button>
    </form>
</div>
@endsection
