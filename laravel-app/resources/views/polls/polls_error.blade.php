@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white">Erro</div>

                    <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <img src="/images/no-vote-image.png" alt="">
                        <p class="lead mb-5">{{ session('error') }}</p>
                        <a href="{{ route('polls.index') }}" class="btn btn-primary mb-5">Regressar à votação</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
