@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $option->theme }}</h1> <!-- Assuming the option has a 'name' attribute -->
        <p>{{ $option->description }}</p> <!-- Assuming the option has a 'description' attribute -->

        <a href="{{ route('options.edit', $option->id) }}" class="btn btn-primary">Editar</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#deleteModal-{{ $option->id }}">Eliminar</button>
    </div>
    @include('options.partials.delete_modal', ['option' => $option])
@endsection
