<div class="columns">
	<div class="column is-2"></div>

	<div class="column is-8 is-vertical-margin">
		<div class="content-padding">
			<h2 class="is-font-headline">Documentation</h2>

            <div class="doc-buttons">
                <span><a id="button-aquashell" href="javascript:void(0);" onclick="window.vue.showDocumentation('aquashell');">Shell</a></span> | <span><a id="button-scripting" href="javascript:void(0);" onclick="window.vue.showDocumentation('scripting');">Scripting</a></span> | <span><a id="button-reference" href="javascript:void(0);" onclick="window.vue.showDocumentation('reference');">Command Reference</a></span>
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
	</div>

	<div class="column is-2"></div>
</div>