@extends('layouts.app')

@section('content')
    <div class="container mt-4" style="padding-bottom: 10%;">
        <h1 class="mb-4">Propostas a votação</h1>

        <!-- Alert sections remain as they are -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Now, encapsulate the table within the card -->
        <div class="card">
            <div class="card-header">Lista de Propostas</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">N.º da Proposta</th>
                                <th>Tema</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($options as $option)
                                <tr>
                                    <td class="text-center">{{ $option->id }}</td>
                                    <td>{{ $option->theme }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('options.show', $option->id) }}"
                                            class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('options.edit', $option->id) }}"
                                            class="btn btn-warning btn-sm">Editar</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $option->id }}">Eliminar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Sem propostas adicionadas!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @foreach ($options as $option)
                    @include('options.partials.delete_modal', ['option' => $option])
                @endforeach
            </div>
        </div>
    </div>
@endsection
