@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Editar detalhes da Votação</h2>
        <form action="{{ route('admin.updatePoll') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Título da votação</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $poll->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição da votação</label>
                <textarea class="form-control" id="description" name="description">{{ $poll->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select" id="status" name="status">
                    <option value="active" @if ($poll->status == 'active') selected @endif>Activo</option>
                    <option value="inactive" @if ($poll->status == 'inactive') selected @endif>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Votação</button>
        </form>
    </div>
@endsection
