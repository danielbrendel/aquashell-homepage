<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Tutorials</h2>

    <p>
        Watch tutorial videos in order to get familiar with AquaShell scripting.
    </p>

    <div class="tutorials">
        @foreach ($tutorials as $tutorial)
            <a name="{{ $tutorial->get('title') }}"></a>

            <h2 class="video-title">{{ $tutorial->get('title') }}</h2><br/>

            <iframe width="560" height="415" src="https://www.youtube.com/embed/{{ $tutorial->get('token') }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <p>
                {{ $tutorial->get('description') }}
            </p>

            <hr class="video-item"/>
        @endforeach
    </div>
</div>