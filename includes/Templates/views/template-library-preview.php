<?php  
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 ?>
<script type="text/template" id="se-liteTemplateLibrary_preview">
    <img class="liteTemplateLibrary_template-preview-thumbnail">
</script>

<script type="text/template" id="se-liteTemplateLibrary_header-insert">
	<div id="elementor-template-library-header-preview-insert-wrapper" class="elementor-templates-modal__header__item">
		<a href="{{ liveurl }}" target="_blank" class="elementor-template-library-template-action header-live-preview">
			<i class="eicon-editor-external-link" aria-hidden="true"></i>
			<?php esc_html_e( 'Live Preview', 'superelements-elementor-addons-widgets-templates' ); ?>
		</a>
		{{{ se.library.getModal().getTemplateActionButton( obj ) }}}
	</div>
</script>