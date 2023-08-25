@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Opções de Votação</h1>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>N.º da Proposta</th>
                    <th>Tema</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($options as $option)
                    <tr>
                        <td>{{ $option->id }}</td>
                        <td>{{ $option->theme }}</td>
                        <td>
                            <a href="{{ route('options.show', $option->id) }}" class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('options.edit', $option->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $option->id }}">Eliminar</button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($options as $option)
            @include('options.partials.delete_modal', ['option' => $option])
        @endforeach

    </div>
@endsection
