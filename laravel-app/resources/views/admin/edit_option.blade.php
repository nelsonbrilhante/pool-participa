@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Poll Option</h2>
    <form action="{{ route('admin.updateOption', ['option' => $option->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="project_number" class="form-label">Project Number</label>
            <input type="number" class="form-control" id="project_number" name="project_number" value="{{ $option->project_number }}" required>
        </div>

        <div class="mb-3">
            <label for="owner" class="form-label">Owner</label>
            <input type="text" class="form-control" id="owner" name="owner" value="{{ $option->owner }}" required>
        </div>

        <div class="mb-3">
            <label for="theme" class="form-label">Theme</label>
            <input type="text" class="form-control" id="theme" name="theme" value="{{ $option->theme }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $option->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount (in euros)</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ $option->amount }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Option</button>
    </form>
</div>
@endsection
