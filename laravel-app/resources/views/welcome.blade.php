@extends('layouts.app')

@section('content')
    <style>
        /* This style ensures that the header takes the full viewport width */
        .full-width-header {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .header-section {
            padding: 10% 0 !important;
            color: white;
        }

        .header-section h1 {
            font-size: 4em;
            font-weight: 800;
        }

        .card-body {
            /* padding: 0; */
        }

        .image-placeholder {
            width: 100%;
            height: 200px;
            /* You can adjust this value according to your needs */
            background-size: cover;
            background-position: center;
            margin-bottom: 15px;

            border-radius: 10px;
        }

        .full-width-divider {
            width: 100vw;
            height: 1px;
            /* Adjust if you want a thicker or thinner divider */
            background-color: #ccc;
            /* Adjust to your preferred divider color */
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }
    </style>

    <!-- First Section: Header -->
    <div class="full-width-header">
        <div class="header-section"
            style="background-image: url('/images/header-bg.jpg'); background-size: cover; width: 100%; text-align: center; padding: 50px 0;">
            <div class="container" style="text-align: left;"> <!-- Added container and text-align style -->
                <h1>Bem-vindo à nossa plataforma de votação</h1>
                <p>Aqui na nossa plataforma de votação, você pode escolher o projeto que mais acredita ser importante para
                    você
                    e o seu bairro. Participe do orçamento participativo e ajude a decidir o futuro da sua vila!</p>
            </div>
        </div>
    </div>

    <!-- Second Section: Options in the Poll -->
    <div class="options-section" style="background-color: white; padding: 50px;">
        <div class="container"> <!-- Added container for consistency -->
            <h1 class="mb-4">Propostas em votação</h1>
            <div class="row">
                @foreach ($poll->options as $option)
                    <div class="col-md-4 mb-4">
                        <div class="card border-white">
                            <div class="card-body">
                                <h3 class="card-title">{{ $option->theme }}</h3>
                                <p class="card-text">{{ $option->description }}</p>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="full-width-divider"></div>
    <!-- Third Section: Information about the Poll -->
    <div class="info-section" style="background-color: white; padding: 50px;">
        <div class="container"> <!-- Added container for consistency -->
            <h1 class="mb-4">Informações sobre a Votação</h1>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card border-white">
                        <div class="image-placeholder" style="background-image: url('/images/demo-01.jpg');"></div>
                        <div class="card-body">
                            <h3 class="card-title">O que é o orçamento participativo?</h3>
                            <p class="card-text">O orçamento participativo é um processo democrático onde os cidadãos
                                decidem e elegem as prioridades de investimentos para a cidade. Com o voto, o cidadão
                                escolhe quais projetos são mais importantes para a região onde vive.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-white">
                        <div class="image-placeholder" style="background-image: url('/images/demo-02.jpg');"></div>
                        <div class="card-body">
                            <h3 class="card-title">Precisamos da sua participação</h3>
                            <p class="card-text">As políticas públicas devem ser pensadas e definidas com a participação
                                ativa dos cidadãos. A sua opinião e seus votos são essenciais para a construção de uma
                                cidade mais justa e igualitária.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-white">
                        <div class="image-placeholder" style="background-image: url('/images/demo-03.jpg');"></div>
                        <div class="card-body">
                            <h3 class="card-title">Como são definidos os projetos?</h3>
                            <p class="card-text">Os projetos são definidos a partir das necessidades e reivindicações dos
                                cidadãos através de assembleias, reuniões e fóruns de discussão. Os projetos aprovados são
                                então incluídos no orçamento da cidade.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full-width-divider"></div>
@endsection
