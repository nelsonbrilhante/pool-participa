@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Atualmente em votação...</h1>
        <div class="row">
            @foreach ($polls as $poll)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">{{ $poll->title }}</div>
                        <div class="card-body">
                            <p>{{ $poll->description }}</p>
                            <a href="{{ route('polls.show', $poll->id) }}" class="btn btn-primary">Votar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
