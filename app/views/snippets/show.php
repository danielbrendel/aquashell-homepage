<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">{{ $snippet->get('title') }}</h2>

    @if (is_string($snippet->get('description')))
    <p class="is-vertical-margin">{{ $snippet->get('description') }}</p>
    @endif

    <div class="is-vertical-margin">
        <pre><code class="hljs language-aquashell">{{ SnippetsModel::fixTab($snippet->get('snippet')) }}</code></pre>
    </div>

    <div class="is-vertical-margin">
        <div class="is-inline-block">
            <a class="button is-info" href="javascript:void(0);" onclick="window.vue.copyToClipboard(document.querySelector('.language-aquashell').innerText, 'Snippet code has been copied to clipboard');">Copy to clipboard</a>
        </div>

        <div class="is-inline-block">
            <a class="button is-link" href="javascript:void(0);" onclick="window.vue.copyToClipboard(window.location.origin + '/snippets/show/{{ $snippet->get('id') }}/{{ $slug }}', 'Link has been copied to clipboard');">Copy link</a>
        </div>
    </div>

    <p class="is-vertical-margin">
        <a href="javascript:void(0);" onclick="history.back();">Go back</a>
    </p>
</div>
