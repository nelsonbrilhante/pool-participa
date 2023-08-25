<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAZARÉ | ORÇAMENTO PARTICIPATIVO 2023</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/op-logo.png') }}" alt="OP2023 Logo" width="60" class="me-2">
                <span style="font-size: 1rem;">Orçamento Participativo '2023</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Auth::check())
                        @if (Auth::user()->is_admin)
                            <!-- Admin Specific Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('options.index') }}">Propostas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="managePollsDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gerir Votação
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="managePollsDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin.editPoll') }}">Editar Votação</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Criar Votação</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.statistics') }}">Estatística</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.manageVoters') }}">Votantes</a>
                            </li>
                            <!-- CSV Import Link -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.csvImport') }}">Importar CSV</a>
                            </li>
                            <li class="nav-item">
                                <span class="navbar-text text-light">{{ Auth::user()->name }}</span>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @elseif (session('voter_id'))
                        <li class="nav-item">
                            <span class="navbar-text text-light">{{ session('voter_id') }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('voter.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('voter-logout-form').submit();">Logout</a>
                            <form id="voter-logout-form" action="{{ route('voter.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registar</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark mt-5">
        <div class="container py-4">
            <div class="row mb-4">
                <!-- Centered Column: Logo -->
                <div class="col-md-12 text-center">
                    <img src="{{ asset('images/op-logo.png') }}" alt="OP2023 Logo" width="150">
                </div>
            </div>
            <div class="row">
                <div class="col text-center text-white mt-3">
                    <p>&copy; 2023 - @php echo date('Y'); @endphp <a href="https://cm-nazare.pt" target="_blank"
                            style="color: inherit; text-decoration: inherit;">Município da Nazaré</a>. Todos os direitos
                        reservados. </p>
                    <p style="font-size: .8rem;">
                        Desenvolvido por: <a href="https://nelsonbrilhante.com" target="_blank"
                            style="color: inherit; text-decoration: inherit;">Nelson Brilhante | GTIM</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
