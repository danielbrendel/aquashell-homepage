<!doctype html>
<html lang="{{ getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1.0">
		<meta name="author" content="Daniel Brendel">
		<meta name="description" content="AquaShell is a scripting and automation shell for Windows using dnyScriptInterpreter">
		<meta name="tags" content="scripting, shell, automation, windows, x64, extendable">
		
		<title>AquaShell - A scripting and automation shell for Windows</title>

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

						<a class="navbar-item" href="{{ url('/documentation') }}">
							Documentation
						</a>

						<a class="navbar-item" href="https://github.com/danielbrendel/dnyAquaShell" target="_blank">
							GitHub
						</a>
					</div>
				</div>
			</nav>

			<div class="header" style="background-image: url('{{ asset('img/header.jpg') }}');">
				<div class="header-inner">
					<div class="columns">
						<div class="column is-2"></div>

						<div class="column is-8">
							<div class="header-content">
								<div class="header-left">
									<img src="{{ asset('img/code.png') }}" alt="Code"/>
								</div>

								<div class="header-right">
									<h1 class="is-font-headline">AquaShell Scripting</h1>

									<hr/>

									<p>
										AquaShell is a scripting and automation system for Windows operating systems.
										It is used to automate Windows tasks via scripts similar to Batch/PS/AutoIt.
									</p>

									<p>
										AquaShell uses dnyScriptInterpreter, an interpreter for the dnyScript scripting
										language. It provides an easy-to-understand syntax yet capable of creating
										complex scripts to automate any task.
									</p>

									<p>
										AquaShell is extendable via plugins, so you can add more scripting functionality
										to the system. By default there are some standard plugins shipped with the product.
									</p>
								</div>
							</div>
						</div>

						<div class="column is-2"></div>
					</div>
				</div>
			</div>

			<div class="content">
				{%content%}
			</div>

			<div class="footer">
				<div class="columns">
        			<div class="column is-4"></div>

					<div class="column is-4">
						<div class="footer-frame">
							<div class="footer-content">
								&copy; {{ date('Y') }} by Daniel Brendel | <span class="is-pointer" title="GitHub" onclick="window.open('https://github.com/danielbrendel/dnyAquaShell');"><i class="fab fa-github"></i></span>&nbsp;&nbsp;&nbsp;<span class="is-pointer" title="Twitter" onclick="window.open('https://twitter.com/dbrendel_dev');"><i class="fab fa-twitter"></i></span>
							</div>
						</div>
					</div>

					<div class="column is-4"></div>
				</div>
			</div>
		</div>

		<script src="{{ asset('js/app.js') }}"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function(){
				window.vue.initNavbar();
			});
		</script>
	</body>
</html>