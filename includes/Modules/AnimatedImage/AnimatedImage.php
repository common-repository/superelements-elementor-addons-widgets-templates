<?php 
/**
 * Add Animated Image 
 */
namespace SuperElement\Modules;
if (!defined('ABSPATH')) {
    exit;
}
class AnimatedImage{
    /**
     * Constractor 
     */
    public function __construct()
    {
        add_action('elementor/element/before_section_start', [$this, 'inject_custom_control'], 11, 4 );
        add_action('elementor/frontend/container/before_render', [$this, 'inject_image']);
        add_action('elementor/frontend/section/before_render', [$this, 'inject_image']);
        add_action('elementor/frontend/container/after_render', [$this, 'inject_image_after']);
        add_action('elementor/frontend/section/after_render', [$this, 'inject_image_after']);
		add_action( 'elementor/section/print_template', [$this, 'inject_image_editor'], 10, 2 );
		add_action( 'elementor/container/print_template',[$this, 'inject_image_editor'], 10, 2 );
        add_action(	'elementor/element/parse_css', [$this, 'add_custom_rules_to_css_file'], 10, 2 );

    }
    function inject_custom_control( $element, $section_id, $args ) {

        if ( ('container' === $element->get_name() || 'section' === $element->get_name()) && 'section_shape_divider' === $section_id ) {
    
            $element->start_controls_section(
                'se_animated_image_section',
                [
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                    'label' => esc_html__( 'Animated Image', 'superelements-elementor-addons-widgets-templates' ),
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'se_animation_name',
                [
                    'label'       => esc_html__( 'Animation Name', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );    
            $repeater->add_control(
                'se_add_animated_image',
                [
                    'label'   => esc_html__( 'Choose Image', 'superelements-elementor-addons-widgets-templates' ),
                    'type'    => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'se_position_start_pos_x',
                [
                    'label'   => esc_html__( 'Icon Position X', 'superelements-elementor-addons-widgets-templates' ),
                    'type'    => \Elementor\Controls_Manager::CHOOSE,
                    'default' => 'left',
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-h-align-left',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-h-align-right',
                        ],
                    ],    
                ]
            );
            $repeater->add_control(
                'se_position_start_pos_y',
                [
                    'label'   => esc_html__( 'Icon Position Y', 'superelements-elementor-addons-widgets-templates' ),
                    'type'    => \Elementor\Controls_Manager::CHOOSE,
                    'default' => 'top',
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-v-align-bottom',
                        ],
                    ],    
                ]
            );
            $repeater->add_responsive_control(
                'animate_image_pos_x',
                [
                    'label' => esc_html__( 'X Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -10000,
                            'max'  => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => -100,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                ]
            );  
            $repeater->add_responsive_control(
                'animate_image_pos_y',
                [
                    'label' => esc_html__( 'Y Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -10000,
                            'max'  => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => -100,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                ]
            );   
            $repeater->add_responsive_control(
                'animate_image_width',
                [
                    'label' => esc_html__( 'Width', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                ]
            );    
            $repeater->add_responsive_control(
                'animate_image_height',
                [
                    'label' => esc_html__( 'Height', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                ]
            );
            
            $repeater->add_control(
                'animate_image_animation',
                [
                    'label' => esc_html__( 'Animation Type', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '',
                    'options' => [
                        ''                     => esc_html__( 'Default', 'superelements-elementor-addons-widgets-templates' ),
                        'none'                 => esc_html__( 'None', 'superelements-elementor-addons-widgets-templates' ),
                        'se-animate-spin'      => esc_html__( 'Spin', 'superelements-elementor-addons-widgets-templates' ),
                        'se-animate-translate' => esc_html__( 'Translate', 'superelements-elementor-addons-widgets-templates' ),
                        'se-animate-tilt'      => esc_html__( 'Tilt', 'superelements-elementor-addons-widgets-templates' ),
                        'double'               => esc_html__( 'Double', 'superelements-elementor-addons-widgets-templates' ),
                    ],
                ]
            );   
            $repeater->add_responsive_control(
                'animate_image_z_index',
                [
                    'label'       => esc_html__( 'z-index', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::NUMBER,
                ]
            );
            $repeater->add_control(
                'hide_on_mobile_portrait',
                [
                    'label' => esc_html__( 'Hide On Mobile Portrait', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off' => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'hide_on_mobile_portrait',
                    'default' => '',
                ]
            );
            $repeater->add_control(
                'hide_on_mobile_landscape',
                [
                    'label' => esc_html__( 'Hide On Mobile Landscape', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off' => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'hide_on_mobile_landscape',
                    'default' => '',
                ]
            );
            $repeater->add_control(
                'hide_on_tablet_portrait',
                [
                    'label' => esc_html__( 'Hide On Tablet Portrait', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off' => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'hide_on_tablet_portrait',
                    'default' => '',
                ]
            );
            $repeater->add_control(
                'hide_on_tablet_landscape',
                [
                    'label' => esc_html__( 'Hide On Tablet Landscape', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off' => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'hide_on_tablet_landscape',
                    'default' => '',
                ]
            );
            $repeater->add_control(
                'hide_on_laptop',
                [
                    'label' => esc_html__( 'Hide On Laptop', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off' => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'hide_on_laptop',
                    'default' => '',
                ]
            );
            $repeater->add_control(
                'hide_on_widescreen',
                [
                    'label' => esc_html__( 'Hide On Widescreen', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off' => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'hide_on_widescreen',
                    'default' => '',
                ]
            );
            $element->add_control(
                'se_animalist',
                [
                    'label'       => esc_html__( 'Add Animated Image', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ se_animation_name }}}',
                ]
            );
            $element->end_controls_section();
        }
    
    }
    public function inject_image( $section ){
        if ($section->get_name() === 'container' || $section->get_name() === 'section') {
            $settings = $section->get_settings_for_display();
            if(isset($settings['se_animalist']) && !empty($settings['se_animalist'])){
                $section->add_render_attribute( '_wrapper', [
                    'class' => '!w-full'
                ] ); ?>
               <div class="se-animation-wrapper relative">
               <?php  foreach($settings['se_animalist'] as $image){
                    $wrapper_class = [];
                    $wrapper_class[] = 'absolute';
                    $wrapper_class[] = 'elementor-repeater-item-'.$image['_id'];
                    $wrapper_class[] = $image['se_position_start_pos_y'].'-0';
                    $wrapper_class[] = $image['se_position_start_pos_x'].'-0';
                    $wrapper_class[] = $image['animate_image_animation'];
                    // display on mobile portrait 
                    if($image['hide_on_mobile_portrait'] != ''){
                        $wrapper_class[] = $image['hide_on_mobile_portrait'];
                    }
                    if($image['hide_on_mobile_landscape'] != ''){
                        $wrapper_class[] = $image['hide_on_mobile_landscape'];
                    }
                    if($image['hide_on_tablet_portrait'] != ''){
                        $wrapper_class[] = $image['hide_on_tablet_portrait'];
                    }
                    if($image['hide_on_tablet_landscape'] != ''){
                        $wrapper_class[] = $image['hide_on_tablet_landscape'];
                    }
                    if($image['hide_on_laptop'] != ''){
                        $wrapper_class[] = $image['hide_on_laptop'];
                    }
                    if($image['hide_on_widescreen'] != ''){
                        $wrapper_class[] = $image['hide_on_widescreen'];
                    }
                    ?>
                    <div class="<?php echo esc_attr(join(' ', $wrapper_class)); ?>">
                        <?php echo wp_kses_post(wp_get_attachment_image($image['se_add_animated_image']['id'])); ?>
                    </div>
                    <?php 
                }
            }
        }
    }
    public function inject_image_after($section) {
        if ($section->get_name() === 'container' || $section->get_name() === 'section') {
            $settings = $section->get_settings_for_display();
            if(isset($settings['se_animalist']) && !empty($settings['se_animalist'])){
                ?>
                 </div>
                <?php 
            }
        }
    }
    // Display on editor 
    public function inject_image_editor( $template ) {
        if ( ! $template ) {
			return;
		}

		ob_start();
		$old_template = $template;
		?>
		 <# if ( '' !== settings.se_animalist) { #>
			<#
				  settings.se_animalist.map(function(item) {
					console.log(item);
                     let imageWidth = item.animate_image_width.size? item.animate_image_width.size + item.animate_image_width.unit: '';
                     let imageXPos = item.animate_image_pos_x.size? item.animate_image_pos_x.size + item.animate_image_pos_x.unit: '';
                     let imageYPos = item.animate_image_pos_y.size? item.animate_image_pos_y.size + item.animate_image_pos_y.unit: '';
                     let seAnimation = item.animate_image_animation? item.animate_image_animation: '';
                     // Image X Responsive Positions 
                     let mobileImageXPos = item.animate_image_pos_x_mobile? item.animate_image_pos_x_mobile.size + item.animate_image_pos_x_mobile.unit : '';
                     let mobile_extraImageXPos = item.animate_image_pos_x_mobile_extra? item.animate_image_pos_x_mobile_extra.size + item.animate_image_pos_x_mobile_extra.unit : '';
                     let tabletImageXPos = item.animate_image_pos_x_tablet? item.animate_image_pos_x_tablet.size + item.animate_image_pos_x_tablet.unit : '';
                     let tablet_extraImageXPos = item.animate_image_pos_x_tablet_extra? item.animate_image_pos_x_tablet_extra.size + item.animate_image_pos_x_tablet_extra.unit : '';
                     let laptopImageXPos = item.animate_image_pos_x_laptop? item.animate_image_pos_x_laptop.size + item.animate_image_pos_x_laptop.unit : '';
                     let widescreenImageXPos = item.animate_image_pos_x_widescreen? item.animate_image_pos_x_widescreen.size + item.animate_image_pos_x_widescreen.unit : '';
                     // Image Y Responsive Positions 
                     let mobileImageYPos = item.animate_image_pos_y_mobile? item.animate_image_pos_y_mobile.size + item.animate_image_pos_y_mobile.unit : '';
                     let mobile_extraImageYPos = item.animate_image_pos_y_mobile_extra? item.animate_image_pos_y_mobile_extra.size + item.animate_image_pos_y_mobile_extra.unit : '';
                     let tabletImageYPos = item.animate_image_pos_y_tablet? item.animate_image_pos_y_tablet.size + item.animate_image_pos_y_tablet.unit : '';
                     let tablet_extraImageYPos = item.animate_image_pos_y_tablet_extra? item.animate_image_pos_y_tablet_extra.size + item.animate_image_pos_y_tablet_extra.unit : '';
                     let laptopImageYPos = item.animate_image_pos_y_laptop? item.animate_image_pos_y_laptop.size + item.animate_image_pos_y_laptop.unit : '';
                     let widescreenImageYPos = item.animate_image_pos_y_widescreen? item.animate_image_pos_y_widescreen.size + item.animate_image_pos_y_widescreen.unit : '';

                     // Image height
                     let mobileImageHeight = item.animate_image_height_mobile? item.animate_image_height_mobile.size + item.animate_image_height_mobile.unit : '';
                     let mobile_extraImageHeight = item.animate_image_height_mobile_extra? item.animate_image_height_mobile_extra.size + item.animate_image_height_mobile_extra.unit : '';
                     let tabletImageHeight = item.animate_image_height_tablet? item.animate_image_height_tablet.size + item.animate_image_height_tablet.unit : '';
                     let tablet_extraImageHeight = item.animate_image_height_tablet_extra? item.animate_image_height_tablet_extra.size + item.animate_image_height_tablet_extra.unit : '';
                     let laptopImageHeight = item.animate_image_height_laptop? item.animate_image_height_laptop.size + item.animate_image_height_laptop.unit : '';
                     let widescreenImageHeight = item.animate_image_height_widescreen? item.animate_image_height_widescreen.size + item.animate_image_height_widescreen.unit : '';
                     // Image Width 
                     let mobileImageWidth = item.animate_image_width_mobile? item.animate_image_width_mobile.size + item.animate_image_width_mobile.unit : '';
                     let mobile_extraImageWidth = item.animate_image_width_mobile_extra? item.animate_image_width_mobile_extra.size + item.animate_image_width_mobile_extra.unit : '';
                     let tabletImageWidth = item.animate_image_width_tablet? item.animate_image_width_tablet.size + item.animate_image_width_tablet.unit : '';
                     let tablet_extraImageWidth = item.animate_image_width_tablet_extra? item.animate_image_width_tablet_extra.size + item.animate_image_width_tablet_extra.unit : '';
                     let laptopImageWidth = item.animate_image_width_laptop? item.animate_image_width_laptop.size + item.animate_image_width_laptop.unit : '';
                     let widescreenImageWidth = item.animate_image_width_widescreen? item.animate_image_width_widescreen.size + item.animate_image_width_widescreen.unit : '';

                     #>
                    
                    <div class="absolute {{item.se_position_start_pos_x}}-0 {{item.se_position_start_pos_y}}-0 se-animated-img elementor-repeater-item-{{item._id}} {{seAnimation}} {{item.hide_on_mobile_portrait}} {{item.hide_on_mobile_landscape}} {{item.hide_on_tablet_portrait}} {{item.hide_on_tablet_landscape}} {{item.hide_on_laptop}} {{item.hide_on_widescreen}}">
                         <img src="{{item.se_add_animated_image.url}}" alt="{{item.se_add_animated_image.alt}}">
                    </div>
                    <# });
				
			#>
		<# } #>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		$template = $content . $old_template;

		return $template;
    }
    function add_custom_rules_to_css_file( $post_css_file, $element) {
        $settings = $element->get_settings_for_display();
        $device_list = [
            0 => 'mobile',
            2 => 'mobile_extra',
            3 => 'tablet',
            4 => 'tablet_extra',
            5 => 'laptop',
            6 => 'desktop',
            7 => 'widescreen',
        ];
    
        if(isset($settings['se_animalist']) && !empty($settings['se_animalist'])){
            foreach($settings['se_animalist'] as $animations){
                // Image size
               if(isset($animations['animate_image_width']['size']) && '' != $animations['animate_image_width']['size']){  
                    $post_css_file->get_stylesheet()->add_rules(
                        '.elementor-repeater-item-'.$animations['_id'].' img',
                        [
                            'width' => $animations['animate_image_width']['size'].$animations['animate_image_width']['unit']
                        ],
                    );
                }
                if(isset($animations['animate_image_height']['size']) && '' != $animations['animate_image_height']['size']){  
                    $post_css_file->get_stylesheet()->add_rules(
                        '.elementor-repeater-item-'.$animations['_id'].' img',
                        [
                            'height' => $animations['animate_image_height']['size'].$animations['animate_image_height']['unit']
                        ],
                    );
                }
                // Image Position Y // se_position_start_pos_y
                if(isset($animations['animate_image_pos_y']['size'])){  
                    $y_post_start = isset($animations['se_position_start_pos_y'])? $animations['se_position_start_pos_y'] : 'top';
                    $post_css_file->get_stylesheet()->add_rules(
                        '.elementor-repeater-item-'.$animations['_id'],
                        [
                            $y_post_start => $animations['animate_image_pos_y']['size'].$animations['animate_image_pos_y']['unit']
                        ],
                    );
                }
                 // Image Position X // se_position_start_pos_x
                 if(isset($animations['animate_image_pos_x']['size'])){  
                    $x_post_start = isset($animations['se_position_start_pos_x']) ? $animations['se_position_start_pos_x'] : 'left';
                    $post_css_file->get_stylesheet()->add_rules(
                        '.elementor-repeater-item-'.$animations['_id'],
                        [
                            $x_post_start => $animations['animate_image_pos_x']['size'].$animations['animate_image_pos_x']['unit']
                        ],
                    );
                }
                // Z index 
                if(isset($animations['animate_image_z_index']) && '' != $animations['animate_image_z_index']){  
                    $post_css_file->get_stylesheet()->add_rules(
                        '.elementor-repeater-item-'.$animations['_id'],
                        [
                            'z-index' => $animations['animate_image_z_index']
                        ],
                    );
                }
             foreach($device_list as $device){
                // Image Width 
                if(isset($animations["animate_image_width_{$device}"]) && !empty($animations["animate_image_width_{$device}"])){
                    $post_css_file->get_stylesheet()->add_rules(
                        '.elementor-repeater-item-'.$animations['_id'].' img',
                        [
                            'width' => $animations["animate_image_width_{$device}"]['size'].$animations["animate_image_width_{$device}"]['unit']
                        ],
                       [
                         'max' => $device, //min or max and device reference
                        ]
                     );
                   }
                   if(isset($animations["animate_image_height_{$device}"]) && !empty($animations["animate_image_height_{$device}"])){
                    $post_css_file->get_stylesheet()->add_rules(
                        '.elementor-repeater-item-'.$animations['_id'].' img',
                        [
                            'width' => $animations["animate_image_height_{$device}"]['size'].$animations["animate_image_height_{$device}"]['unit']
                        ],
                       [
                         'max' => $device, //min or max and device reference
                        ]
                     );
                   }
                                 // Image Position Y // se_position_start_pos_y
                    if(isset($animations["animate_image_pos_y_{$device}"]['size'])){  
                        $y_post_start = isset($animations["se_position_start_pos_y_{$device}"])? $animations["se_position_start_pos_y_{$device}"] : 'top';
                        $post_css_file->get_stylesheet()->add_rules(
                            '.elementor-repeater-item-'.$animations['_id'],
                            [
                                $y_post_start => $animations["animate_image_pos_y_{$device}"]['size'].$animations["animate_image_pos_y_{$device}"]['unit']
                            ],
                        );
                    }
                    // Image Position X // se_position_start_pos_x
                    if(isset($animations["animate_image_pos_x_{$device}"]['size'])){  
                        $x_post_start = isset($animations["se_position_start_pos_x_{$device}"])? $animations["se_position_start_pos_x_{$device}"] : 'left';
                        $post_css_file->get_stylesheet()->add_rules(
                            '.elementor-repeater-item-'.$animations['_id'],
                            [
                                $x_post_start => $animations["animate_image_pos_x_{$device}"]['size'].$animations["animate_image_pos_x_{$device}"]['unit']
                            ],
                        );
                    }
              }// end device loop
            }
        }
    }
    
}