<?php



	function regScripts() {

        wp_dequeue_script('jquery');

        wp_deregister_script('jquery');

        wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css', array(), '', 'all');

        wp_enqueue_style('custom', get_stylesheet_directory_uri().'/custom.css', array(), '', 'all');

        wp_enqueue_script('vendors', get_template_directory_uri()."/assets/js/vendors.js",'','', true);

        wp_enqueue_script('commons', get_template_directory_uri()."/assets/js/commons.js",'','', true);

	}