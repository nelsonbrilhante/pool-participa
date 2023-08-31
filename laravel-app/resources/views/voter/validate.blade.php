@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Voter Validation</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('voter.validate') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Introduza o seu nome completo</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Validar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
