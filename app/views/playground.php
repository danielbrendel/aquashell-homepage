<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Code Editor</h2>

    <div>
        <p>This online code editor can be used to test the scripting language. Feel free to enter script code that is then executed and its result returned.</p>

        @if (env('CE_AUTH'))
            <div class="code-authentication">
                <input type="text" class="input" id="code-authentication" placeholder="Enter authentication token..."/>
            </div>
        @endif

        <div class="code-editor">
            <textarea id="code-editing" oninput="window.vue.updateCodeEditor(this.value, '#code-highlighting-content'); window.vue.syncEditorScrolling(this, '#code-highlighting-content');" onkeypress="if (event.keyCode == 13) { event.stopPropagation(); }" spellcheck="false"></textarea>

            <pre id="code-highlighting" aria-hidden="true">
                <code class="hljs language-aquashell" id="code-highlighting-content"></code>
            </pre>
        </div>

        <div class="code-response">
            <textarea class="textarea" id="code-response-log" placeholder="I/O" readonly></textarea>
        </div>

        <div class="code-actions">
            <span><a class="button is-link" href="javascript:void(0);" onclick="window.vue.runCodeAndReturnResponse('{{ $code_runner }}', '#code-authentication', document.querySelector('#code-editing').value, '#code-response-log', '#code-actions-spinner');">Run Code</a></span>
            <span><a class="button" href="javascript:void(0);" onclick="window.vue.clearCodeContext();">Clear</a></span>
            <span><i class="fas fa-spinner fa-spin" id="code-actions-spinner"></i></span>
        </div>
    </div>
</div>