<div class="full-width-section">
    <div class="container-fluid">
        <div class="row">
            <!-- Left Column: Background Image -->
            <div class="col-md-4" style="background-image: url('/images/demo-01.jpg'); background-size: cover;"></div>

            <!-- Right Column: Content -->
            <div class="col-md-8 py-5">
                <div class="container-sm g-5">
                    <h1>Fale connosco</h1>
                    <p>Para dúvidas, sugestões ou informações, deixe sua mensagem em nosso formulário de contato.
                        Retornaremos o mais rápido possível.</p>

                    <!-- Contact Form -->
                    <form action="/contact-submit" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
