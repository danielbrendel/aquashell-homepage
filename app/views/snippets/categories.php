<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Snippets</h2>

    <div>
        <p class="is-vertical-margin">Browse through various example and productive snippets.</p>

        <div class="snippets-categories is-vertical-margin">
            @foreach ($categories as $category)
                <a href="{{ url('/snippets/category/' . strtolower($category->get('name'))) }}">
                    <div class="snippets-category">
                        <div class="snippets-category-icon"><i class="{{ $category->get('icon') }} fa-4x"></i></div>

                        <div class="snippets-category-info">
                            <div class="snippets-category-info-name">{{ $category->get('name') }}</div>
                            <div class="snippets-category-info-count">{{ SnippetsModel::getCategoryCount($category->get('id')) }} snippets</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>