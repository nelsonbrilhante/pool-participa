@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Thank you for voting!</h2>
        <p>Here are the details of your vote:</p>

        <div class="card">
            <div class="card-header">Poll: {{ $poll->title }}</div>
            <div class="card-body">
                // Display the options and other details related to the vote.
                @foreach ($options as $option)
                    <p>{{ $option->description }} - Votes: {{ $option->vote_count }}</p>
                @endforeach
            </div>
        </div>

        <a href="{{ route('polls.index') }}" class="btn btn-primary mt-4">Back to Polls</a>
    </div>
@endsection
