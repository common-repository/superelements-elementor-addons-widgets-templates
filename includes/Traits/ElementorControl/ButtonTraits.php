<?php 
namespace SuperElement\ElementorControl\Traits;
/**
 * Button Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait ButtonTraits {
	/**
	 * Button Style Control 
	 */
	protected function register_button_content_controls( $args = [] ) {
		$default_args = [
			'section_condition' => [],
			'button_default_text' => esc_html__( 'Click here', 'superelements-elementor-addons-widgets-templates' ),
			'text_control_label' => esc_html__( 'Text', 'superelements-elementor-addons-widgets-templates' ),
			'alignment_control_prefix_class' => 'elementor%s-align-',
			'alignment_default' => '',
			'icon_exclude_inline_options' => [],
		];

		$args = wp_parse_args( $args, $default_args );

		$this->add_control(
			'button_type',
			[
				'label' => esc_html__( 'Type', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'superelements-elementor-addons-widgets-templates' ),
					'info' => esc_html__( 'Info', 'superelements-elementor-addons-widgets-templates' ),
					'success' => esc_html__( 'Success', 'superelements-elementor-addons-widgets-templates' ),
					'warning' => esc_html__( 'Warning', 'superelements-elementor-addons-widgets-templates' ),
					'danger' => esc_html__( 'Danger', 'superelements-elementor-addons-widgets-templates' ),
				],
				'prefix_class' => 'elementor-button-',
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'text',
			[
				'label' => $args['text_control_label'],
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => $args['button_default_text'],
				'placeholder' => $args['button_default_text'],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'superelements-elementor-addons-widgets-templates' ),
				'default' => [
					'url' => '#',
				],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				// 'prefix_class' => $args['alignment_control_prefix_class'],
				'default' => $args['alignment_default'],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => $this->get_button_sizes(),
				'style_transfer' => true,
				'condition' => $args['section_condition'],
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,
				'condition' => $args['section_condition'],
				'icon_exclude_inline_options' => $args['icon_exclude_inline_options'],
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'superelements-elementor-addons-widgets-templates' ),
					'right' => esc_html__( 'After', 'superelements-elementor-addons-widgets-templates' ),
				],
				'condition' => array_merge( $args['section_condition'], [ 'selected_icon[value]!' => '' ] ),
			]
		);

		$this->add_responsive_control(
			'icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
                    $args['section_condition'],
                    'selected_icon' !=''
                ],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => esc_html__( 'View', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'button_css_id',
			[
				'label' => esc_html__( 'Button ID', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'ai' => [
					'active' => true,
				],
				'default' => '',
				'title' => esc_html__( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'superelements-elementor-addons-widgets-templates' ),
				'separator' => 'before',
				'condition' => $args['section_condition'],
			]
		);
	}
    /**
	 * Button Style Control 
	 */
    public function register_button_style_controls($attrs = []) {

		$unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];

		$this->add_responsive_control(
			$unique_id.'width',
			[
				'label' => esc_html__( 'Width', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => $condition
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => $unique_id.'typography',
				'selector' => '{{WRAPPER}} '.$class,
				'condition' => $condition,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => $unique_id.'text_shadow',
				'selector' => '{{WRAPPER}} '.$class,
				'condition' => $condition,
			]
		);

		$this->start_controls_tabs ( 
			$unique_id.'tabs_button_style',
			[
				'condition' => $condition,
			] 
		);

			$this->start_controls_tab(
				$unique_id.'tab_button_normal',
				[
					'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
					'condition' => $condition,
				]
			);

				$this->add_control(
					$unique_id.'button_text_color',
					[
						'label' => esc_html__( 'Text Color', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} '.$class => 'fill: {{VALUE}}; color: {{VALUE}};',
						],
						'condition' => $condition,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => $unique_id.'background',
						'types' => [ 'classic', 'gradient' ],
						'exclude' => [ 'image' ],
						'selector' => '{{WRAPPER}} '.$class,
						'fields_options' => [
							'background' => [
								'default' => 'classic',
							],
						],
						'condition' => $condition,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => $unique_id.'button_box_shadow',
						'selector' => '{{WRAPPER}} '.$class,
						'condition' => $condition,
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				$unique_id.'tab_button_hover',
				[
					'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
					'condition' => $condition,
				]
			);

				$this->add_control(
					$unique_id.'hover_color',
					[
						'label' => esc_html__( 'Text Color', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus' => 'color: {{VALUE}};',
							'{{WRAPPER}} '.$class.':hover svg, {{WRAPPER}} '.$class.':focus svg' => 'fill: {{VALUE}};',
						],
						'condition' => $condition,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => $unique_id.'button_background_hover',
						'types' => [ 'classic', 'gradient' ],
						'exclude' => [ 'image' ],
						'selector' => '{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus',
						'fields_options' => [
							'background' => [
								'default' => 'classic',
							],
						],
						'condition' => $condition,
					]
				);

				$this->add_control(
					$unique_id.'button_hover_border_color',
					[
						'label' => esc_html__( 'Border Color', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} '.$class.':hover, {{WRAPPER}} '.$class.':focus' => 'border-color: {{VALUE}};',
						],
						'condition' => $condition,
					]
				);

				$this->add_control(
					$unique_id.'hover_animation',
					[
						'label' => esc_html__( 'Hover Animation', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
						'condition' => $condition,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => $unique_id.'button_box_shadow_hover',
						'selector' => '{{WRAPPER}} '.$class.':hover',
						'condition' => $condition,
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => $unique_id.'border',
				'selector' => '{{WRAPPER}} '.$class,
				'separator' => 'before',
				'condition' => $condition,
			]
		);

		$this->add_responsive_control(
			$unique_id.'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => $condition,
			]
		);

		$this->add_responsive_control(
			$unique_id.'padding',
			[
				'label' => esc_html__( 'Padding', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
				'condition' => $condition,
			]
		);

		$this->add_responsive_control(
			$unique_id.'margin',
			[
				'label' => esc_html__( 'Margin', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => $condition,
			]
		);
	}
	/**
	 * Button text 
	 */
	protected function render_text( \Elementor\Widget_Base $instance = null ) {
		// The default instance should be `$this` (a Button widget), unless the Trait is being used from outside of a widget (e.g. `Skin_Base`) which should pass an `$instance`.
		if ( empty( $instance ) ) {
			$instance = $this;
		}

		$settings = $instance->get_settings_for_display();

		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && \Elementor\Icons_Manager::is_migration_allowed();

		if ( ! $is_new && empty( $settings['icon_align'] ) ) {
			// @todo: remove when deprecated
			// added as bc in 2.6
			//old default
			$settings['icon_align'] = $instance->get_settings( 'icon_align' );
		}

		$instance->add_render_attribute( [
			'content-wrapper' => [
				'class' => 'elementor-button-content-wrapper',
			],
			'icon-align' => [
				'class' => [
					'elementor-button-icon',
					'elementor-align-icon-' . $settings['icon_align'],
				],
			],
			'text' => [
				'class' => 'elementor-button-text',
			],
		] );

		// TODO: replace the protected with public
		?>
		<span <?php $instance->print_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
			<span <?php $instance->print_render_attribute_string( 'icon-align' ); ?>>
				<?php if ( $is_new || $migrated ) :
					\Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<span <?php $instance->print_render_attribute_string( 'text' ); ?>><?php $this->print_unescaped_setting( 'text' ); ?></span>
		</span>
		<?php
	}
	protected function render_button( \Elementor\Widget_Base $instance = null ) {
		if ( empty( $instance ) ) {
			$instance = $this;
		}

		$settings = $instance->get_settings_for_display();
		if($settings['text'] == '' ){
			return ;
		}

		$instance->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper' );

		$instance->add_render_attribute( 'button', 'class', 'elementor-button' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$instance->add_link_attributes( 'button', $settings['link'] );
			$instance->add_render_attribute( 'button', 'class', 'elementor-button-link' );
		} else {
			$instance->add_render_attribute( 'button', 'role', 'button' );
		}

		if ( ! empty( $settings['button_css_id'] ) ) {
			$instance->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		if ( ! empty( $settings['size'] ) ) {
			$instance->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( ! empty( $settings['hover_animation'] ) ) {
			$instance->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}
		if ( ! empty( $settings['align'] ) ) {
			$get_meta = array_keys($settings);
			$matches  = preg_grep ('/^align/i', $get_meta);
			  if(is_array($matches) && !empty($matches)){
				foreach($matches as $key=> $get){
					$get_device = explode('_', $get);
					if(count($get_device) > 1 ){
						$device = end($get_device);
						$instance->add_render_attribute( 'wrapper', 'class', 'elementor-'.$device.'-align-'. $settings['align'] );
					}

				}
			  }
			  
		}	$instance->add_render_attribute( 'wrapper', 'class', 'elementor-align-'.'' . $settings['align'] );

		?>
		<div <?php $instance->print_render_attribute_string( 'wrapper' ); ?>>
			<a <?php $instance->print_render_attribute_string( 'button' ); ?>>
				<?php $this->render_text( $instance ); ?>
			</a>
		</div>
		<?php
	}
	public function get_button_sizes() {
		return [
			'xs' => esc_html__( 'Extra Small', 'superelements-elementor-addons-widgets-templates' ),
			'sm' => esc_html__( 'Small', 'superelements-elementor-addons-widgets-templates' ),
			'md' => esc_html__( 'Medium', 'superelements-elementor-addons-widgets-templates' ),
			'lg' => esc_html__( 'Large', 'superelements-elementor-addons-widgets-templates' ),
			'xl' => esc_html__( 'Extra Large', 'superelements-elementor-addons-widgets-templates' ),
		];
	}
}