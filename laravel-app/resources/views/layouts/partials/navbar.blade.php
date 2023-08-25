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
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="managePollsDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Votação
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="managePollsDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.showCreatePollForm') }}">Criar
                                        Votação</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.editPoll') }}">Editar Votação</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('options.index') }}">Ver lista de
                                        propostas</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.showAddOptionForm') }}">Adicionar
                                        proposta</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.manageVoters') }}">Caderno Eleitoral</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.csvImport') }}">Importar dados</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.statistics') }}">Estatística</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Ver Frontend</a>
                        </li>
                    @endif
                @elseif(session('voter_id'))
                    @php
                        $voter = \App\Models\Voter::where('id_number', session('voter_id'))->first();
                    @endphp
                    @if ($voter)
                        <li class="nav-item">
                            <span class="navbar-text mr-3">{{ $voter->name }}</span>
                        </li>
                    @endif
                @endif

                <!-- Logout Link -->
                @if (session('voter_id') || Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li class="nav-item">
                    <p class="navbar-text mr-3" style="color:white;">{{ Auth::user()->name }}</p>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
