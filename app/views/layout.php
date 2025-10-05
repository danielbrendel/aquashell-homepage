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
		<script src="{{ asset('js/app.js', true) }}"></script>
	</head>
	
	<body>
		<div id="main">
			@include('navbar.php')
			@include('header.php')

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
								@if (env('APP_CONTACT'))
								&copy; {{ date('Y') }} by <a href="{{ ((strpos(env('APP_CONTACT'), '@') !== false) ? 'mailto:' : '') }}{{ env('APP_CONTACT') }}">Daniel Brendel</a>
								@else
								&copy; {{ date('Y') }} by Daniel Brendel
								@endif
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

		<script>
			document.addEventListener('DOMContentLoaded', function(){
				window.vue.initNavbar();

				document.body.addEventListener('scroll', function() {
                    if ((document.body.scrollTop > document.getElementsByClassName('navbar')[0].offsetHeight + 10) || (document.documentElement.scrollTop > document.getElementsByClassName('navbar')[0].offsetHeight + 10)) {
                        document.getElementsByClassName('navbar')[0].classList.add('navbar-background-color');  
                    } else {
                        document.getElementsByClassName('navbar')[0].classList.remove('navbar-background-color');
                    }
                });

				window.hljs.registerLanguage('aquashell', function() {
					return {
						case_insensitive: false,
						keywords: {
							keyword: 'global const set if function elseif else for while local result unset call class method member construct destruct require exec run cwd gwd getscriptpath getscriptname debug textview random sleep bitop gettickcount timestamp fmtdatetime getsystemerror setsystemerror threadfunc hideconsole listlibs print sys pause exit quit',
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