<div class="columns">
	<div class="column is-2"></div>

	<div class="column is-8 is-vertical-margin">
		<div class="content-padding">
			<h2 class="is-font-headline">Documentation</h2>

            <div class="doc-buttons">
                <span><a id="button-aquashell" href="javascript:void(0);" onclick="window.vue.showDocumentation('aquashell');">Shell</a></span> | <span><a id="button-scripting" href="javascript:void(0);" onclick="window.vue.showDocumentation('scripting');">Scripting</a></span>
            </div>

            <div class="is-hidden" id="documentation-aquashell">
                <p>
                    Basic commands:

                    <ul>
                        <li>require # Attempts to load a plugin library. Only needed when not running in interactive mode</li>
                        <li>exec (scriptfile) # Executes a script file</li>
                        <li>sys (string) # Passes the string to the Windows batch system</li>
                        <li>run (./) (path> (args) (dir) # Attempts to launch a specified file </li>
                        <li>listlibs # Lists all shell plugin libraries</li>
                        <li>quit # Exists the shell</li>
                    </ul>
                </p>

                <p>
                    Multiline support:

                    <ul>
                        <li>\< # Opens the editor in multiline mode</li>
                        <li>(code)</li>
                        <li>\> # Closes the multiline mode and executes the script code</li>
                    </ul>
                </p>

                <p>
                    Init and unload script:

                    <ul>
                        <li>You can place a script named 'init.dnys' in the 'scripts' directory of the base directory
                        which will get executed when the shell is in loading progress. There you can place
                        initialization code</li>
                        <li>You can place a script named 'unload.dnys' in the 'scripts' directory of the base directory
                        which will get executed when the shell gets unloaded. There you can place cleanup code</li>
                    </ul>
                </p>

                <p>
                    Plugin API:

                    <ul>
                        <li>Plugins must be written in C++</li>
                        <li>A plugin needs to export the functions 'dnyAS_PluginLoad' and 'dnyAS_PluginUnload'</li>
                        <li>The first one is called when the plugin gets loaded. There you must implement all
                        loading stuff. The function recieves the current shell interface version, a pointer
                        to the plugin API class instance and a pointer to a plugin information structure
                        where the plugin should save its information strings. If everything goes well then
                        the plugin must return true, otherwise false.</li>
                        <li>The latter one is called when the plugin gets unloaded. There you can implement
                        all cleanup stuff. </li>
                        <li>Please refer to the <a href="https://github.com/danielbrendel/dnyAquaShell/tree/main/defplugins/_base" target="_blank">demo plugin sourcecode</a> in order to view a full documented example</li>
                    </ul>
                </p>

                <p>
                    This software is using dnyScriptInterpreter v1.0 developed by Daniel Brendel.
                    Please refer to <a href="https://github.com/danielbrendel/dnyAquaShell/blob/main/dnyAquaShell/dnyScriptInterpreter.md" target="_blank">dnyScriptInterpreter.md</a> for more details.
                </p>
            </div>

            <div class="is-hidden" id="documentation-scripting">
                Coming soon...
            </div>
		</div>
	</div>

	<div class="column is-2"></div>
</div>