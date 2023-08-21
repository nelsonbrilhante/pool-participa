@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $poll->title }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('polls.vote', $poll->id) }}">
                    @csrf
                    @foreach ($poll->options as $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="option" id="option{{ $option->id }}"
                                value="{{ $option->id }}">
                            <label class="form-check-label" for="option{{ $option->id }}">
                                {{ $option->description }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit Vote</button>
                </form>
            </div>
        </div>
    </div>
@endsection
