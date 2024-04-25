<!doctype html>
<html lang="{{ getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1.0">

		<meta name="author" content="{{ env('APP_AUTHOR') }}">
		<meta name="description" content="{{ env('APP_DESCRIPTION') }}">
		<meta name="keywords" content="{{ env('APP_KEYWORDS') }}">

		<meta name="og:title" property="og:title" content="{{ env('APP_TITLE') }}">
		<meta name="og:description" property="og:description" content="{{ env('APP_DESCRIPTION') }}">
		<meta name="og:url" property="og:url" content="{{ url('/') }}">
		<meta name="og:image" property="og:image" content="{{ asset('img/preview.png') }}">
		
		<title>{{ env('APP_TITLE') }}</title>

		<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}"/>

		@if (env('APP_DEBUG'))
        <script src="{{ asset('js/vue.js') }}"></script>
        @else
        <script src="{{ asset('js/vue.min.js') }}"></script>
        @endif
		<script src="{{ asset('js/fontawesome.js') }}"></script>
	</head>
	
	<body>
		<div id="main">
			<nav class="navbar is-link" role="navigation" aria-label="main navigation">
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

			@if ((isset($show_header)) && ($show_header))
			<div class="header" style="background-image: url('{{ asset('img/header.jpg') }}');">
				<div class="header-overlay">
					<div class="header-content">
						<h1>AquaShell Scripting & Automation Shell</h1>

							<h2>Automate tasks on Windows or develop complex scripted applications</h2>

							<div class="header-badges">
								<img src="https://img.shields.io/badge/os-windows-orange" alt="os-windows"/>
								<img src="https://img.shields.io/badge/license-MIT-blue" alt="license-mit"/>
								<img src="https://img.shields.io/badge/maintained-yes-green" alt="maintained-yes"/>
							</div>

							<div class="header-buttons">
								<div>
									<a class="button is-link" href="javascript:void(0);" onclick="window.vue.scrollTo('a[name=info]');">Read more</a>
								</div>

								<div>
									<a class="button is-success" href="{{ url('/download') }}">Download</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif

			<div class="container">
				<div class="columns">
					<div class="column is-2"></div>

					<div class="column is-8">
						{%content%}
					</div>

					<div class="column is-2"></div>
				</div>
			</div>

			<div class="footer">
				<div class="columns">
        			<div class="column is-4"></div>

					<div class="column is-4">
						<div class="footer-frame">
							<div class="footer-content">
								&copy; {{ date('Y') }} by Daniel Brendel
							</div>
						</div>
					</div>

					<div class="column is-4"></div>
				</div>
			</div>

			<div class="scroll-to-top">
				<div class="scroll-to-top-inner">
					<a href="javascript:void(0);" onclick="document.querySelector('#main').scrollIntoView({behavior: 'smooth'});"><i class="fas fa-arrow-up fa-2x up-color"></i></a>
				</div>
			</div>
		</div>

		<script src="{{ asset('js/app.js') }}"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function(){
				window.vue.initNavbar();

				window.hljs.registerLanguage('aquashell', function() {
					return {
						case_insensitive: false,
						keywords: {
							keyword: 'global const set if function elseif else for while local result unset call class method member construct destruct require exec run cwd listlibs print sys pause exit quit',
							literal: 'bool int float string void true false',
						},
						contains: [
						{
							className: 'string',
							begin: '"',
							end: '"'
						},
						hljs.COMMENT(
							'#',
							"\n",
							{}
						)
						]
					}
				});
				window.hljs.highlightAll();

				if (document.getElementById('button-aquashell')) {
					document.getElementById('button-aquashell').click();
				}

				window.onresize();

				@if ((isset($tab)) && (is_string($tab)))
					let btnel = document.getElementById('button-{{ $tab }}');
					if (btnel) {
						btnel.click();
					}
				@endif
			});

			window.onresize = function() {
				let he = document.getElementById('mobile-code-image');
				if (he) {
					if (document.body.clientWidth <= 1103) {
						if (he.classList.contains('is-hidden')) {
							he.classList.remove('is-hidden');
						}
					} else {
						if (!he.classList.contains('is-hidden')) {
							he.classList.add('is-hidden');
						}
					}
				}
			}
		</script>
	</body>
</html>