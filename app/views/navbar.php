<nav class="navbar is-link is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item navbar-item-brand is-font-title" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo"/>&nbsp;AquaShell
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-end">
            <a class="navbar-item" href="{{ url('/') }}">
                Home
            </a>

            <a class="navbar-item" href="{{ url('/download') }}">
                Download
            </a>

            <a class="navbar-item" href="{{ url('/examples') }}">
                Examples
            </a>

            <a class="navbar-item" href="{{ url('/extensions') }}">
                Extensions
            </a>

            <a class="navbar-item" href="{{ url('/documentation') }}">
                Documentation
            </a>

            @if (TutorialsModel::count()->get() > 0)
            <a class="navbar-item" href="{{ url('/tutorials') }}">
                Tutorials
            </a>
            @endif

            <a class="navbar-item" href="https://github.com/danielbrendel/dnyAquaShell" target="_blank">
                GitHub
            </a>
        </div>
    </div>
</nav>