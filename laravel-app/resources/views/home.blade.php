@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">PLATAFORMA DE VOTO</h1>

        <div class="row">
            <!-- Voter Login Section -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <div class="card-header">Sou eleitor...</div>
                    <div class="card-body">
                        <div id="error-message" class="alert alert-danger mt-3" style="display:none;">
                            <!-- Error message will be inserted here -->
                        </div>
                        <form id="voter-login-form" method="POST" action="{{ route('voter.login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="id_number" class="form-label">ID (Cartão de Cidadão ou Bilhete de
                                    Identidade)</label>
                                <input type="text" class="form-control" id="id_number" name="id_number" required>
                            </div>

                            <div id="name-field" class="mb-3" style="display:none;">
                                <label for="name" class="form-label">Introduza o seu nome completo</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <small class="form-text text-muted">
                                    Nome deve ser introduzido em letras MAIÚSCULAS, com ACENTOS, tal como registado
                                    no seu Cartão de Cidadão ou Bilhete de Identidade.
                                </small>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Admin Login Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Sou administrador...</div>
                    <div class="card-body">
                        <!-- Display Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Entrar como administrador</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#voter-login-form').on('submit', function(e) {
                e.preventDefault();

                // Clear any previous error messages
                $('#error-message').hide().text('');

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log("Success response: ", response);

                        if (response.message === 'requiresNameValidation') {
                            // Show the name input field
                            $('#name-field').show();
                        } else if (response.success) {
                            // Redirect to the poll page
                            window.location.href = '{{ route('polls.index') }}';
                        } else {
                            // Handle any other unexpected success scenarios here
                            $('#error-message').show().text(response.message ||
                                'Unexpected error.');
                        }
                    },
                    error: function(jqXHR) {
                        console.log("Error response: ", jqXHR);
                        console.log("Response Text: ", jqXHR.responseText);
                        console.log("Status: ", jqXHR.status);
                        console.log("Status Text: ", jqXHR.statusText);
                        // Show error message
                        $('#error-message').show().text(jqXHR.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
