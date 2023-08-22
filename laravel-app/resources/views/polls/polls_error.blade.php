@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white">Erro</div>

                    <div class="card-body">
                        <p class="lead">{{ session('error') }}</p>
                        <a href="{{ route('polls.index') }}" class="btn btn-primary">Regressar à votação</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
