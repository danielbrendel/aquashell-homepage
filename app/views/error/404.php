<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Error 404</h2>

    <p>The requested resource {{ $_SERVER['REQUEST_URI'] }} was not found on the server.</p>

    <p>
        <button type="button" class="button btn-col-contact" onclick="location.href = '{{ url('/') }}';">Go home</button>
    </p>
</div>