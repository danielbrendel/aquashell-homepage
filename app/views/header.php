@if ((isset($show_header)) && ($show_header))
<div class="header" style="background-image: url('{{ asset('img/header.png') }}');">
    <div class="header-overlay">
        <div class="header-content">
            <h1>AquaShell</h1>

            <h2>The Open-source Scripting Environment for Windows</h2>

            <div class="header-badges">
                <img src="https://img.shields.io/badge/os-windows-orange?style=for-the-badge" alt="os-windows"/>
                <img src="https://img.shields.io/badge/license-MIT-blue?style=for-the-badge" alt="license-mit"/>
                <img src="https://img.shields.io/badge/maintained-yes-green?style=for-the-badge" alt="maintained-yes"/>
            </div>

            <div class="header-buttons">
                <div>
                    <a class="button is-info is-rounded is-outlined is-large" href="javascript:void(0);" onclick="window.vue.scrollTo('a[name=info]');">Read more</a>
                </div>

                <div>
                    <a class="button is-success is-rounded is-outlined is-large" href="{{ url('/download') }}">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif