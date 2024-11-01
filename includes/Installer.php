<?php

namespace SuperElement;
if (!defined('ABSPATH')) {
    exit;
}
class Installer
{
    /**
     * Initialize class functions
     *
     * @return void
     */
    public function run()
    {
        $this->add_version();
    }

    /**
     * Store plugin information
     *
     * @return void
     */
    public function add_version()
    {
        $installed = get_option('redq_se_installed');

        if (!$installed) {
            update_option('redq_se_installed', time());
        }

        update_option('redq_se_version', REDQ_SE_VERSION);
    }
}
