<?php  
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 ?>
<?php $logo = REDQ_SE_INC_ASSETS.'/Templates/assets/template_logo.svg'; ?>
<script type="text/template" id="se-liteTemplateLibrary_header-logo">
	<span class="liteTemplateLibrary_logo-wrap">
		<img src="<?php echo esc_url($logo); ?>" alt="Super Logo">
	</span>
    <span class="liteTemplateLibrary_logo-title">{{{ title }}}</span>
</script>

<script type="text/template" id="se-liteTemplateLibrary_header-back">
	<i class="eicon-" aria-hidden="true"></i>
	<span><?php echo esc_html__( 'Back to Library', 'superelements-elementor-addons-widgets-templates' ); ?></span>
</script>

<script type="text/template" id="se-liteTemplateLibrary_header-menu">
	<# _.each( tabs, function( args, tab ) { var activeClass = args.active ? 'elementor-active' : ''; #>
		<div class="elementor-component-tab elementor-template-library-menu-item {{activeClass}}" data-tab="{{{ tab }}}">{{{ args.title }}}</div>
	<# } ); #>
</script>

<script type="text/template" id="se-liteTemplateLibrary_header-menu-responsive">
	
</script>

<script type="text/template" id="se-liteTemplateLibrary_header-actions">
	<div id="liteTemplateLibrary_header-sync" class="elementor-templates-modal__header__item">
		<i class="eicon-sync" aria-hidden="true" title="<?php esc_attr_e( 'Sync Library', 'superelements-elementor-addons-widgets-templates' ); ?>"></i>
		<span class="elementor-screen-only"><?php esc_html_e( 'Sync Library', 'superelements-elementor-addons-widgets-templates' ); ?></span>
	</div>
</script>