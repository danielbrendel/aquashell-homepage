<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">{{ $category->get('name') }}</h2>

    @if (is_string($category->get('description')))
    <p class="is-vertical-margin">{{ $category->get('description') }}</p>
    @endif

    <div class="is-vertical-margin">
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

    <p class="is-vertical-margin">
        <a href="{{ url('/snippets') }}">Go back</a>
    </p>
</div>