<div class="content">
	<a name="info"></a>
	<h2 class="is-font-headline">Welcome to AquaShell</h2>

	<p>
		AquaShell is an easy-to-use Windows scripting and automation system. It integrates well with Windows and allows your to both create automation
		tasks as well as complex scripting applications. The product features a plugin system, so the shell can be extended with more commands. 
		Of course there are standard plugins provided already. The syntax is inspired by C++, PHP, Tcl and PowerShell. It is easy to learn in order to
		quickly start developing your scripts.
	</p>

	<p>
		AquaShell is opensourced software released under the MIT license. This ensures full transparency and allows you to contribute.
		We welcome you to provide feedback and report bugs as well as create your own plugins to enhance the shell functionality. 
		If you need help with creating scripts, feel free to create an issue on GitHub.
	</p>

	<div class="image-showcase">
		<div class="image-showcase-item">
			<h3>Create Complex scripts</h3>
			<img src="{{ asset('img/code1.png') }}" alt="Code"/>
		</div>

		<div class="image-showcase-item">
			<h3>Make Automations</h3>
			<img src="{{ asset('img/code2.png') }}" alt="Code"/>
		</div>

		<div class="image-showcase-item">
			<h3>Develop Applications</h3>
			<img src="{{ asset('img/code3.png') }}" alt="Code"/>
		</div>
	</div>

	<hr/>

	<h2>Bring back the fun of Windows shell scripting</h2>

	<p class="is-font-medium">AquaShell provides features that enrich your shell scripting experience</p>

	<div class="feature-cards">
		<div class="feature-cards-block">
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Interactive Commandline</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Integration with Windows</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Fast Windows automation</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Complex scripted applications</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;OpenSource project</div>
		</div>

		<div class="feature-cards-block feature-cards-block-fix">
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Plugin interface</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Many pre-configured plugins</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Internal/external Cmds</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;VS Code & Npp integration</div>
			<div class="feature-card"><i class="fas fa-star"></i>&nbsp;Maintained since 2017</div>
		</div>
	</div>

	@if (env('APP_ENABLESPONSORING'))
		<hr/>

		<p class="is-font-medium">
			Your support is greatly appreciated
		</p>

		<p>
			Your support helps to continue working on the project and providing the required infrastructure.
		</p>

		<p class="sponsoring">
			<a href='https://ko-fi.com/C0C7V2ESD' target='_blank'><img height='36' style='border:0px;height:36px;' src='https://storage.ko-fi.com/cdn/kofi2.png?v=3' border='0' alt='Buy Me a Coffee at ko-fi.com' /></a>
		</p>
	@endif
</div>
	