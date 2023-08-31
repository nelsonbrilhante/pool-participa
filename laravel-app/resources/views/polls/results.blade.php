@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">{{ $poll->title }} - Results</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($poll->options as $option)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $option->description }}
                            <span class="badge bg-primary rounded-pill">{{ $option->vote_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
