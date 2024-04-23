<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Extensions</h2>

    <p>
        AquaShell can be extended via plugins in order to provide additional functionality to scripts.
        The shell does also feature a few default plugins which are listed below.
    </p>

    <div class="extension-list">
        <h3>Default extensions</h3>

        <div class="info-list">
            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">Array</div>
                    <div class="info-list-header-button"><span class="button is-link is-not-clickable">Language</span></div>
                </div>

                <div class="info-list-content">Provides array features. There are static and dynamic arrays available.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">Auto</div>
                    <div class="info-list-header-button"><span class="button is-warning is-not-clickable">System</span></div>
                </div>

                <div class="info-list-content">Provides features to automate tasks on Windows.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">DateTime</div>
                    <div class="info-list-header-button"><span class="button is-link is-not-clickable">Language</span></div>
                </div>

                <div class="info-list-content">A datetime utility to format date and time strings.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">EnvVars</div>
                    <div class="info-list-header-button"><span class="button is-warning is-not-clickable">System</span></div>
                </div>

                <div class="info-list-content">Exposes all environment variables to the script context.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">Events</div>
                    <div class="info-list-header-button"><span class="button is-link is-not-clickable">Language</span></div>
                </div>

                <div class="info-list-content">Allows registration and raising events.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">FileIO</div>
                    <div class="info-list-header-button"><span class="button is-warning is-not-clickable">System</span></div>
                </div>

                <div class="info-list-content">Provides various functions to perform file system operations.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">Forms</div>
                    <div class="info-list-header-button"><span class="button is-primary is-not-clickable">UI</span></div>
                </div>

                <div class="info-list-content">Can be used to create and handle Windows forms for GUI scripts.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">InputBox</div>
                    <div class="info-list-header-button"><span class="button is-primary is-not-clickable">UI</span></div>
                </div>

                <div class="info-list-content">This component allows the usage of a simple GUI input box.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">IRC</div>
                    <div class="info-list-header-button"><span class="button is-danger is-not-clickable">Network</span></div>
                </div>

                <div class="info-list-content">A component to create IRC clients. Useful for IRC bots.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">MiscUtils</div>
                    <div class="info-list-header-button"><span class="button is-warning is-not-clickable">System</span></div>
                </div>

                <div class="info-list-content">Various commands that do not fit a specific category.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">NetClient</div>
                    <div class="info-list-header-button"><span class="button is-danger is-not-clickable">Network</span></div>
                </div>

                <div class="info-list-content">A component to create network clients. Supports both TCP and UDP.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">Speech</div>
                    <div class="info-list-header-button"><span class="button is-warning is-not-clickable">System</span></div>
                </div>

                <div class="info-list-content">This component allows you to use the Microsoft SAPI.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">Strings</div>
                    <div class="info-list-header-button"><span class="button is-link is-not-clickable">Language</span></div>
                </div>

                <div class="info-list-content">A utility component to do string manipulation.</div>
            </div>

            <div class="info-list-item">
                <div class="info-list-header">
                    <div class="info-list-header-title">TextInput</div>
                    <div class="info-list-header-button"><span class="button is-primary is-not-clickable">UI</span></div>
                </div>

                <div class="info-list-content">Used to get text input from the commandline.</div>
            </div>
        </div>
    </div>

    <p>
        <h3>Installation</h3>

        Unless not specified otherwise, extensions are placed into the <strong>/plugins</strong> directory of your AquaShell installation.
        If you want to create your own extension, please refer to the plugin SDK in the <a href="{{ url('/download') }}">downloads section</a>.
    </p>
</div>