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

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">OP2023</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                        <li class="nav-item">
                            <span class="navbar-text">{{ Auth::user()->name }}</span>
                        </li>
                        @if (Auth::user()->is_admin)
                            <!-- Admin Specific Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="managePollsDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage Poll
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="managePollsDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin.editPoll') }}">Edit Poll</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.showAddOptionForm') }}">Add
                                            Option</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin.showEditOptionForm', ['optionId' => 1]) }}">Edit
                                            Option</a></li>
                                    <!-- You can later add the link for removing options once the method is added in the controller -->
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.statistics') }}">Statistics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.manageVoters') }}">Manage Voters</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @elseif (session('voter_id'))
                        <li class="nav-item">
                            <span class="navbar-text">{{ session('voter_id') }}</span>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('voter.logout') }}"
                                onclick="event.preventDefault();
                        document.getElementById('voter-logout-form').submit();">
                                Logout
                            </a>
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
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
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

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
