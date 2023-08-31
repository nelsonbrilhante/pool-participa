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
