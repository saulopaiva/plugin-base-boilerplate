<?php

class AcfFilters
{
    public function load()
    {
        //$this->acfJsonSavePoint(); // Uncomment this to save ACF fields on this plugin structure (acf-json)
        $this->acfJsonLoadPoint();
        $this->acfOptionsPage();
    }

    public function acfJsonSavePoint()
    {
        add_filter('acf/settings/save_json', function ($path) {
            $path = dirname(__FILE__) . '/../acf-json';
            return $path;
        });
    }

    public function acfJsonLoadPoint()
    {
        add_filter('acf/settings/load_json', function ($paths) {
            $paths[] = dirname(__FILE__) . '/../acf-json';
            return $paths;
        });
    }

    public function acfOptionsPage()
    {
        add_filter('acf/init', function () {
            if( function_exists('acf_add_options_page') ) {
                acf_add_options_page(array(
                    'page_title'    => __('Plugin Base Boilerplate Settings'),
                    'menu_title'    => __('Plugin Base Boilerplate Settings'),
                    'menu_slug'     => 'plugin-base-boilerplate-settings',
                    'capability'    => 'edit_posts',
                    'redirect'      => false
                ));
            }
        });
    }
}
