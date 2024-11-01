<?php

namespace SuperElement;
if (!defined('ABSPATH')) {
    exit;
}
class SuperNavWalkerMobile extends \Walker_Nav_Menu
{
    public function start_lvl( &$output, $depth = 0, $args = []) {

       $indent = str_repeat("\t", $depth);
       $output .= "\n$indent<ul class=\"dropdown-menu submenu\">\n";
    }

    public function start_el(&$output, $page, $depth = 0, $args = [], $current_page = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $menu_id = isset($args->menu) ? $args->menu : '';
        $enable_meta_menu_list = $this->get_mega_menu_enable_list();
        $mega_menu = '';
        $mega_menu_width = '';
        if(is_array($enable_meta_menu_list) && in_array($menu_id, $enable_meta_menu_list)){
            $mega_menu = get_post_meta($page->ID, '_supper_mega_menu', true);
            $mega_menu_width = get_post_meta($page->ID, '_supper_mega_menu_layout', true);    
        }

         $li_attributes = '';
         $class_names = $value = '';
         $classes =  empty($page->classes) ? array() : (array) $page->classes ;    
         $classes[] = 'nav-item' ;
         $classes[] = ($mega_menu != '') ? 'has-mega-menu': '' ;
         $classes[] = ($mega_menu != '' && $mega_menu_width != '') ? $mega_menu_width: '' ;
         $classes[]  =   ($args->walker->has_children) ? 'submenu' : '';
         $classes[]  =   ($page->current || $page->current_item_ancestor) ? 'active current-menu-item current_item_ancestor' : '';
         $classes[]  =   'menu-item-'.$page->ID;
         $has_child_icon = '';
         if($depth && $args->walker->has_children) {
            $classes[] = 'submenu';
         }
         $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter($classes), $page, $args));
         $class_names = 'class="'.esc_attr($class_names).'"';

         $id = apply_filters( 'nav_menu_item_id', 'menu-item'.$page->ID, $page, $args );

         $id = strlen($id) ? 'id="'.esc_attr($id).'"' : '';

         $output .= $indent. '<li '.$class_names. $id . $value. $li_attributes.'>';

        $attributes = ! empty( $page->attr_title ) ? ' title="' . esc_attr($page->attr_title) . '"' : '';
		$attributes .= ! empty( $page->target ) ? ' target="' . esc_attr($page->target) . '"' : '';
		$attributes .= ! empty( $page->xfn ) ? ' rel="' . esc_attr($page->xfn) . '"' : '';
		$attributes .= ! empty( $page->url ) ? ' href="' . esc_attr($page->url) . '"' : '';

            $general_icon = '';
            if($depth == 0 && $args->walker->has_children) {

                $general_icon = '<span class="dropdown-arrow"><i class="ti-angle-down"></i></span>';
    
            }elseif ($depth > 0 && $args->walker->has_children) {
    
                $general_icon = '<i class="ti-angle-right"></i>';
            }
            $mega_menu_html = '';
       
        if($mega_menu != '' && class_exists('\Elementor\Plugin')) {
            $elementor = \Elementor\Plugin::instance();
            $mega_menu_html = '<span class="dropdown-arrow"><i class="ti-angle-down"></i></span><div class="se-mega-menu sub-menu">'.$elementor->frontend->get_builder_content_for_display(  $mega_menu  ).'</div>';
        }
        
        $item_output = $args->before;
       
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $page->title, $page->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $general_icon;
        
        
        if($mega_menu_html != '') {
            $item_output .= $mega_menu_html;
        }
		$item_output .= $args->after;

        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $page, $depth, $args );
    }
    public function get_mega_menu_enable_list() {
        return  get_option('redq_se_mega_menu_enable_list');
    }
}
