<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Text Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait TextTraits {

	protected function se_typography_controls($attrs=[]){

		$unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
		$label  = isset($attrs['label']) ? $attrs['label'] : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'		=> $label,
                'name'		=> $unique_id.'typography',
				'selector'	=>'{{WRAPPER}} '.$class,  
				'condition'	=> $condition,
			]
		);
    }

	protected function se_text_alignment_controls($attrs=[])
    {
        $unique_id		= isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class			= isset($attrs['class']) ? $attrs['class'] : null;
		$condition		= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
		$default		= isset($attrs['default']) ? $attrs['default'] : 'left';

        $this->add_responsive_control(
			$unique_id.'title_align',
			[
				'label'			=> esc_html__( 'Text Align', 'superelements-elementor-addons-widgets-templates' ),
				'type'			=> Controls_Manager::CHOOSE,
				'default'		=> esc_html($default),
				'options'		=> [
					'start'		=> [
						'title' => esc_html__( 'Start', 'superelements-elementor-addons-widgets-templates' ),
						'icon'	=> 'eicon-h-align-left',
					],
					'center'	=> [
						'title' => esc_html__( 'Center', 'superelements-elementor-addons-widgets-templates' ),
						'icon'	=> 'eicon-h-align-center',
					],
					'end'		=> [
						'title' => esc_html__( 'End', 'superelements-elementor-addons-widgets-templates' ),
						'icon'	=> 'eicon-h-align-right',
					],
                    'justify'	=> [
						'title' => esc_html__( 'Justify', 'superelements-elementor-addons-widgets-templates' ),
						'icon'	=> 'eicon-justify-space-around-h',
					],
				],
				'toggle'		=> 'true',
                'selectors'		=> [
                    '{{WRAPPER}} '.$class => 'text-align: {{VALUE}}',
                ],
				'condition'		=> $condition,
			]
		);
    }

    protected function se_text_style_controls($attrs=[]){

		$unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
		$label  	= isset($attrs['label']) ? $attrs['label'] : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
		$separator  = isset($attrs['separator']) ? $attrs['separator'] : null;
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label'		=>  $label,
                'name'		=> $unique_id.'typography',
				'selector'	=>'{{WRAPPER}} '.$class,  
				'condition' => $condition,
			]
		);

        $this->add_responsive_control(
            $unique_id.'color',
            [
                'label'			=> $label,
                'type'			=> \Elementor\Controls_Manager::COLOR,
                'selectors'		=> [
                    '{{WRAPPER}} '.$class => 'color: {{VALUE}}',
                ],
				'condition'		=> $condition,
				'separator'		=> esc_html($separator),
            ]
        );
    }
     
}