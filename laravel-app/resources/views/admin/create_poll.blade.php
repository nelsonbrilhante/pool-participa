@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create New Poll</h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Poll Details</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.createPoll') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Poll Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description (Optional)</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Poll</button>
                </form>
            </div>
        </div>
    </div>
@endsection
