<?php

namespace SuperElement\Traits;

use SuperElement\Elementor;
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Test Trait.
 */
trait WidgetsList
{
    /**
     * SuperElement register widgets.
     *
     * @return array
     */
    public function widgets_register()
    {
        return [
            'Button' => [
                'label' => 'Button',
                'php' => 'Button',
                'class' => new Elementor\Button(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'IconBox' => [
                'label' => 'Icon Box',
                'php' => 'IconBox',
                'class' => new Elementor\IconBox(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'Team' => [
                'label' => 'Team',
                'php' => 'Team',
                'class' => new Elementor\Team(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'VideoPopUp' => [
                'label' => 'Video PopUp',
                'php' => 'VideoPopUp',
                'class' => new Elementor\VideoPopUp(),
                'js' => 'video-pop-up',
                'css' => '',
            ],
            'Testimonial' => [
                'label' => 'Testimonial',
                'php' => 'Testimonial',
                'class' => new Elementor\Testimonial(),
                'js' => 'testimonial',
                'js_deps' => ['jquery'],
                'css' => 'testimonial',
            ],
            'Posts' => [
                'label' => 'Posts Grid',
                'php' => 'Posts',
                'class' => new Elementor\Posts(),
                'js' => 'posts',
                'js_deps' => ['jquery'],
                'css' => 'posts',
            ],
            'SubscriptionForm' => [
                'label' => 'Subscription Form',
                'php' => 'SubscriptionForm',
                'class' => new Elementor\SubscriptionForm(),
                'js' => 'subscription-form',
                'js_deps' => [],
                'css' => '',
            ],
            'FancyTitle' => [
                'label' => 'Fancy Title',
                'php' => 'FancyTitle',
                'class' => new Elementor\FancyTitle(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'Menu' => [
                'label' => 'Menu',
                'php' => 'Menu',
                'class' => new Elementor\Menu(),
                'js' => 'menu',
                'js_deps' => ['jquery'],
                'css' => '',
            ],
            'Timeline' => [
                'label' => 'Timeline',
                'php' => 'Timeline',
                'class' => new Elementor\Timeline(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'Tab' => [
                'label' => 'Tab',
                'php' => 'Tab',
                'class' => new Elementor\Tab(),
                'js' => 'tab',
                'js_deps' => ['jquery'],
                'css' => '',
            ],
            'PricingTabs' => [
                'label' => 'Pricing Tabs',
                'php' => 'PricingTabs',
                'class' => new Elementor\PricingTabs(),
                'js' => 'pricing-tabs',
                'js_deps' => ['jquery'],
                'css' => '',
            ],
            'Accordions' => [
                'label' => 'Accordions',
                'php' => 'Accordions',
                'class' => new Elementor\Accordions(),
                'js' => 'accordions',
                'js_deps' => [],
                'css' => '',
            ],
            'AnimatedImage' => [
                'label' => 'Animated Image',
                'php' => 'AnimatedImage',
                'class' => new Elementor\AnimatedImage(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'ContactForm' => [
                'label' => 'Contact Form',
                'php' => 'ContactForm',
                'class' => new Elementor\ContactForm(),
                'js' => '',
                'js_deps' => [],
                'css' => 'contact-form',
            ],
            'ImageHotspot' => [
                'label' => 'Image Hotspot',
                'php' => 'ImageHotspot',
                'class' => new Elementor\ImageHotspot(),
                'js' => 'image-hotspot',
                'js_deps' => ['jquery'],
                'css' => 'imagehotspot',
            ],
        ];
    }

    /**
     * Get all registered widgets.
     *
     * @return array
     */
    public function get_widgets()
    {
        return $this->widgets_register();
    }

    public function get_woo_widgets()
    {
        return [
            'MiniCart' => [
                'label' => 'Mini Cart',
                'php' => 'MiniCart',
                'class' => new Elementor\MiniCart(),
                'js' => 'mini-cart',
                'js_deps' => ['jquery'],
                'css' => 'mini-cart',
            ],
            'MyAccount' => [
                'label' => 'My Account',
                'php' => 'MyAccount',
                'class' => new Elementor\MyAccount(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'Cart' => [
                'label' => 'Cart',
                'php' => 'Cart',
                'class' => new Elementor\Cart(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'ProductTitle' => [
                'label' => 'Product Title',
                'php' => 'ProductTitle',
                'class' => new Elementor\ProductTitle(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'AddToCart' => [
                'label' => 'Add To Cart',
                'php' => 'AddToCart',
                'class' => new Elementor\AddToCart(),
                'js' => 'add-to-cart',
                'js_deps' => ['jquery'],
                'css' => 'add-to-cart',
            ],
            'ProductRating' => [
                'label' => 'Product Rating',
                'php' => 'ProductRating',
                'class' => new Elementor\ProductRating(),
                'js' => '',
                'js_deps' => [],
                'css' => 'product-rating',
            ],
            'ProductStock' => [
                'label' => 'Product Stock',
                'php' => 'ProductStock',
                'class' => new Elementor\ProductStock(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'ProductMeta' => [
                'label' => 'Product Meta',
                'php' => 'ProductMeta',
                'class' => new Elementor\ProductMeta(),
                'js' => '',
                'js_deps' => [],
                'css' => 'product-meta',
            ],
            'ProductTabs' => [
                'label' => 'Product Tabs',
                'php' => 'ProductTabs',
                'class' => new Elementor\ProductTabs(),
                'js' => '',
                'js_deps' => [],
                'css' => 'product-tabs',
            ],
            'ProductShortDescriptions' => [
                'label' => 'Product Short Descriptions',
                'php' => 'ProductShortDescriptions',
                'class' => new Elementor\ProductShortDescriptions(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'AdditionalInformation' => [
                'label' => 'Additional Information',
                'php' => 'AdditionalInformation',
                'class' => new Elementor\AdditionalInformation(),
                'js' => '',
                'js_deps' => [],
                'css' => 'additional-information',
            ],
            'RelatedProducts' => [
                'label' => 'Related Products',
                'php' => 'RelatedProducts',
                'class' => new Elementor\RelatedProducts(),
                'js' => '',
                'js_deps' => [],
                'css' => 'related-products',
            ],
            'ProductUpsells' => [
                'label' => 'Product Upsells',
                'php' => 'ProductUpsells',
                'class' => new Elementor\ProductUpsells(),
                'js' => '',
                'js_deps' => [],
                'css' => 'upsell-products',
            ],
            'WooCommerceBreadcrumbs' => [
                'label' => 'WooCommerce Breadcrumbs',
                'php' => 'WooCommerceBreadcrumbs',
                'class' => new Elementor\WooCommerceBreadcrumbs(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'ProductImage' => [
                'label' => 'Product Image',
                'php' => 'ProductImage',
                'class' => new Elementor\ProductImage(),
                'js' => '',
                'js_deps' => [],
                'css' => 'product-image',
            ],
            'ProductPrice' => [
                'label' => 'Product Price',
                'php' => 'ProductPrice',
                'class' => new Elementor\ProductPrice(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'Products' => [
                'label' => 'Products',
                'php' => 'Products',
                'class' => new Elementor\Products(),
                'js' => 'products',
                'js_deps' => [],
                'css' => 'products',
            ],
            'CheckOut' => [
                'label' => 'CheckOut',
                'php' => 'CheckOut',
                'class' => new Elementor\CheckOut(),
                'js' => '',
                'js_deps' => [],
                'css' => '',
            ],
            'Notice' => [
                'label' => 'Notice',
                'php' => 'Notice',
                'class' => new Elementor\Notice(),
                'js' => '',
                'js_deps' => [],
                'css' => 'notice',
            ],
        ];
    }
}
