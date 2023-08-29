@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Option Details -->
    <div class="row">
        <div class="col-12">
            <h1 class="display-4">{{ $option->theme }}</h1>
            <p class="lead">{{ $option->description }}</p>
            @if(isset($option->project_number))
                <p><strong>Proposta N.º:</strong> {{ $option->project_number }}</p>
            @endif
            @if(isset($option->owner))
                <p><strong>Proponente:</strong> {{ $option->owner }}</p>
            @endif
            @if(isset($option->amount))
                <p><strong>Montante Imputado:</strong> {{ $option->amount }}</p>
            @endif
            <!-- Other attributes can be added in a similar manner -->
        </div>
    </div>

    <!-- Edit and Delete Buttons -->
    <div class="row mt-3">
        <div class="col-12">
            <a href="{{ route('options.edit', $option->id) }}" class="btn btn-primary me-2">Editar</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $option->id }}">Eliminar</button>
        </div>
    </div>
</div>

@include('options.partials.delete_modal', ['option' => $option])
@endsection
