@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Voter Login</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('voter.login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="id_number" class="form-label">ID Number</label>
                        <input type="text" class="form-control" id="id_number" name="id_number" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
