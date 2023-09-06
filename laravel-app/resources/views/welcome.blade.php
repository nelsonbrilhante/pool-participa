@extends('layouts.app')

@section('content')
    @include('partials.welcome.header')

    @if (!$isPollActive)
        <div class="alert alert-warning mt-3">
            Neste momento não existe qualquer votação a decorrer.
        </div>
    @endif
    @if ($isPollActive)
        @include('partials.welcome.options')
    @endif

    <div class="full-width-divider"></div>

    @include('partials.welcome.information')

    <div class="full-width-divider"></div>

    @include('partials.welcome.cards')

    <div class="full-width-divider"></div>

    @include('partials.welcome.timeline')

    <div class="full-width-divider"></div>

    @include('partials.welcome.faq')

    <div class="full-width-divider"></div>

    @include('partials.welcome.contact')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var faqHeaders = document.querySelectorAll('.faq-header');
            faqHeaders.forEach(header => {
                header.addEventListener('click', function() {

                    // Close all FAQ items
                    var faqContents = document.querySelectorAll('.faq-content.show');
                    faqContents.forEach(content => {
                        var bsCollapse = new bootstrap.Collapse(content, {
                            toggle: false
                        });
                        bsCollapse.hide(); // Use Bootstrap's collapse method
                    });

                    // Open the clicked FAQ item
                    var targetId = this.getAttribute('data-target');
                    var targetElement = document.querySelector(targetId);
                    var bsCollapseTarget = new bootstrap.Collapse(targetElement, {
                        toggle: true
                    });
                    bsCollapseTarget.show(); // Use Bootstrap's collapse method
                });
            });
        });
    </script>
@endsection
