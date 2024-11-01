<?php

namespace SuperElement;
if (!defined('ABSPATH')) {
    exit;
}
class Admin
{
    /**
     * Class initialize
     */
    function __construct()
    {
        new Admin\Menu();
        new Admin\AdminManager();
        new Admin\CMB2();
    }
}
