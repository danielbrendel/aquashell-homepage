<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Examples</h2>

    <div>
        <p>Here you will find some example scripts to give you an idea on using the shell.</p>

        <ul>
            @foreach ($snippets as $snippet)
                <li>
                    <a href="#{{ slug($snippet->get('description')) }}">{{ $snippet->get('description') }}</a>
                </li>
            @endforeach
        </ul>

        @foreach ($snippets as $snippet)
            <a name="{{ slug($snippet->get('description')) }}"></a>

            <h2>{{ $snippet->get('description') }}</h2>
            
            <pre><code class="hljs language-aquashell">{{ SnippetsModel::fixTab($snippet->get('snippet')) }}</code></pre>
        @endforeach
    </div>
</div>