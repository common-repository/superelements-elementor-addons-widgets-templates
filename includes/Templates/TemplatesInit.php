<?php
namespace SuperElement\Templates;

defined('ABSPATH') || die();

class TemplatesInit
{
    private static $instance = null;

    public static function url(){
        return trailingslashit(REDQ_SE_URL). 'includes/templates/';
    }

    public static function dir(){
        return trailingslashit(REDQ_SE_PATH). 'includes/Templates/';
    }

    public static function version(){
        if( defined('REDQ_SE_VERSION') ){
            return REDQ_SE_VERSION;
        } else {
            return apply_filters('redq_se_super_element_pro_version', '1.0.0');
        }
        
    }

    public function init()
    {
        add_action( 'wp_enqueue_scripts', function() {       
            wp_enqueue_style( "se-el-template-front", __DIR__ . '/assets/css/template-frontend.min.css' , ['elementor-frontend'], self::version() );  
            } 
        );
        
        add_action( 'elementor/editor/after_enqueue_scripts', function() {     
            wp_enqueue_style( "redq-se-template-editor", self::url() . 'assets/css/template-library.min.css' , ['elementor-editor'], self::version() );  
            wp_enqueue_script("redq-se-template-editor", self::url() . 'assets/js/template-library.min.js', ['elementor-editor'], self::version(), true); 
            $pro = get_option('__validate_author_dtaddons__', false);
            
            $localize_data = [
                'hasPro'                          => !$pro ? false : true,
                'templateLogo'                    => self::url() . 'assets/template_logo.svg',
                'i18n' => [
                    'templatesEmptyTitle'       => esc_html__( 'No Templates Found', 'superelements-elementor-addons-widgets-templates' ),
                    'templatesEmptyMessage'     => esc_html__( 'Try different category or sync for new templates.', 'superelements-elementor-addons-widgets-templates' ),
                    'templatesNoResultsTitle'   => esc_html__( 'No Results Found', 'superelements-elementor-addons-widgets-templates' ),
                    'templatesNoResultsMessage' => esc_html__( 'Please make sure your search is spelled correctly or try a different words.', 'superelements-elementor-addons-widgets-templates' ),
                ],
                'tab_style' => wp_json_encode(self::get_tabs()),
                'default_tab' => 'section'
            ];
            wp_localize_script(
                'redq-se-template-editor',
                'superElementorEditor',
                $localize_data
            );

            } 
        );

        add_action( 'elementor/preview/enqueue_styles', function(){
            $data = '.elementor-add-new-section .se_templates_add_button {
                background-color: #6045bc;
                margin-left: 5px;
                font-size: 18px;
                vertical-align: bottom;
            }
            ';
            wp_add_inline_style( 'se-el-template-front', $data );
        } );
    }

    public static function get_tabs(){
        return apply_filters('redq_se_editor/templates_tabs', [
            'section' => [ 'title' => esc_html__('Blocks', 'superelements-elementor-addons-widgets-templates')],
            'page' => [ 'title' => esc_html__('Ready Pages', 'superelements-elementor-addons-widgets-templates')],
        ]);
    }
    public static function instance(){
        if( is_null(self::$instance) ){
            self::$instance = new self();
        }
        return self::$instance;
    } 
}

