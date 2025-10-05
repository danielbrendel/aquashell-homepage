<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">{{ $category->get('name') }}</h2>

    @if (is_string($category->get('description')))
    <p class="is-vertical-margin">{{ $category->get('description') }}</p>
    @endif

    <div class="is-vertical-margin">
        <ul>
            @foreach ($snippets as $snippet)
                <li>
                    <a href="{{ url('/snippets/show/' . $snippet->get('id') . '/' . slug($snippet->get('title'))) }}">{{ $snippet->get('title') }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <p class="is-vertical-margin">
        <a href="{{ url('/snippets') }}">Go back</a>
    </p>
</div>