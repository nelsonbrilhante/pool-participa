@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar votação</h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Check if the poll exists -->
        @if (isset($poll))
            <div class="card">
                <div class="card-header">Detalhes da votação</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.updatePoll') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $poll->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição (Opcional)</label>
                            <textarea class="form-control" id="description" rows="13" name="description">{{ $poll->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Estado</label>
                            <select class="form-select" id="status" name="status">
                                <option value="active" @if ($poll->status == 'active') selected @endif>Ativa</option>
                                <option value="inactive" @if ($poll->status == 'inactive') selected @endif>Inactiva</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        @else
            <!-- Display the warning if the poll does not exist -->
            <div class="alert alert-warning">
                Não existe votação para editar.
            </div>
        @endif
    </div>
@endsection
