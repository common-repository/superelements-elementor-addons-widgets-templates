<?php
namespace SuperElement\Templates;

defined('ABSPATH') || die();


use \SuperElement\Templates\TemplateApi;
use \Elementor\Core\Common\Modules\Ajax\Module as Ajax;
use \Elementor\Plugin;

class TemplateImport
{
    private static $instance = null;

    protected static $template = null;

    public function load(){
        add_action( 'elementor/ajax/register_actions', array($this, 'ajax_actions' ) );
    }

    public function ajax_actions( Ajax $ajax ){
        $ajax->register_ajax_action( 'get_dladdon_template_data', function( $data ) {
            if ( ! current_user_can( 'edit_posts' ) ) {
                throw new \Exception( 'Access Denied' );
            }
            
            if ( ! empty( $data['editor_post_id'] ) ) {
                $editor_post_id = absint( $data['editor_post_id'] );

                if ( ! get_post( $editor_post_id ) ) {
                    throw new \Exception( esc_html__( 'Post not found', 'superelements-elementor-addons-widgets-templates' ) );
                }
                Plugin::$instance->db->switch_to_post( $editor_post_id );
            }

            if ( empty( $data['template_id'] ) ) {
                throw new \Exception( esc_html__( 'Template id missing', 'superelements-elementor-addons-widgets-templates' ) );
            }
            return self::get_template_data( $data );
        });
    }

    public static function get_template_data( array $args ) {
        $template = self::template_library();
        return $template->get_data( $args );
    }

    public static function template_library() {
        if ( is_null( self::$template ) ) {
            self::$template = new TemplateApi();
        }
        return self::$template;
    }

    public static function instance(){
        if( is_null(self::$instance) ){
            self::$instance = new self();
        }
        return self::$instance;
    }
}