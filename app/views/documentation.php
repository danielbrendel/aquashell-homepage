<div class="content margin-fix is-left-aligned">
    <h2 class="is-font-headline">Documentation</h2>

    <div class="doc-buttons">
        <span><a id="button-aquashell" href="javascript:void(0);" onclick="window.vue.showDocumentation('aquashell');">Shell</a></span> | <span><a id="button-scripting" href="javascript:void(0);" onclick="window.vue.showDocumentation('scripting');">Scripting</a></span> | <span><a id="button-reference" href="javascript:void(0);" onclick="window.vue.showDocumentation('reference');">Command Reference</a></span>
    </div>

    <div class="doc-copy-link">
        <i class="fas fa-copy"></i>&nbsp;<a id="copy-article-link" href="javascript:void(0);" data-link="" onclick="window.vue.copyToClipboard(this.dataset.link, 'Link has been copied to clipboard.');">Copy link to this article</a>
    </div>

    <div class="is-hidden" id="documentation-aquashell">
        {!! $shell_doc !!}
    </div>

    <div class="is-hidden" id="documentation-scripting">
        {!! $scripting_doc !!}
    </div>

    <div class="is-hidden" id="documentation-reference">
        {!! $reference_doc !!}
    </div>
</div>