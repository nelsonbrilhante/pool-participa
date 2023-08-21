@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Poll</h2>
        <form action="{{ route('admin.updatePoll') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Poll Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $poll->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $poll->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="active" @if ($poll->status == 'active') selected @endif>Active</option>
                    <option value="inactive" @if ($poll->status == 'inactive') selected @endif>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Poll</button>
        </form>
    </div>
@endsection
