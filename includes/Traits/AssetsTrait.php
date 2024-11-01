<?php

namespace SuperElement\Traits;

/**
 * Test Trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait AssetsTrait
{
    /**
     * SuperElement scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'bhenfmcm' => [
                'src'     => REDQ_SE_ASSETS . '/vendors/lordicon/lordicon.js',
                'version' => '4.0.3',
                'deps'    => ['jquery']
            ],
            'redq-se-admin' => [
                'src'     => REDQ_SE_ASSETS . '/js/admin.js',
                'version' => filemtime(REDQ_SE_PATH . '/assets/js/admin.js'),
                'deps'    => ['jquery']
            ],
            'redq-se-global' => [
                'src'     => REDQ_SE_URL . '/dist/se-global.min.js',
                'version' => filemtime(REDQ_SE_PATH . '/dist/se-global.min.js'),
                'deps'    => ['jquery']
            ],
            'slick' => [
                'src'     => REDQ_SE_ASSETS . '/vendors/slick/slick.min.js',
                'version' => '1.8.1',
                'deps'    => ['jquery']
            ],
        ];
    }

    /**
     * super element styles
     *
     * @return array
     */
    public function get_styles()
    {
        return [
            'redq-se-global' => [
                'type' => 'global',
                'src'     => REDQ_SE_DIST . '/se-global.css',
                'version' => filemtime(REDQ_SE_PATH . '/dist/se-global.css'),
            ],
            'redq-se-tailwind' => [
                'type' => 'global',
                'src'     => REDQ_SE_DIST . '/se-tailwind.css',
                'version' => filemtime(REDQ_SE_PATH . '/dist/se-tailwind.css'),
            ],
            'slick' => [
                'type' => 'global',
                'src'     => REDQ_SE_ASSETS . '/vendors/slick/slick.css',
                'version' => '1.8.1'
            ],
            'slick-theme' => [
                'type' => 'global',
                'src'     => REDQ_SE_ASSETS . '/vendors/slick/slick-theme.css',
                'version' => '1.8.1'
            ]
        ];
    }

}