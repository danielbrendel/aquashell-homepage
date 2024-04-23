<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Examples</h2>

    <div>
        <p>Here you will find some example scripts to give you an idea on using the shell.</p>

        @foreach ($snippets as $snippet)
            <h2>{{ $snippet->get('description') }}</h2>

            <pre><code class="hljs language-aquashell">{{ SnippetsModel::fixTab($snippet->get('snippet')) }}</code></pre>
        @endforeach
    </div>
</div>