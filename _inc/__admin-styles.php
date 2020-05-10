<?php



    // Limpeza de Painel



    function remove_menus(){



        global $post;



        remove_menu_page( 'index.php' );                  //Dashboard



        remove_menu_page( 'jetpack' );                    //Jetpack*



        remove_menu_page( 'edit.php' );                   //Posts



        // remove_menu_page( 'upload.php' );                 //Media



        // remove_menu_page( 'edit.php?post_type=page' );    //Pages



        remove_menu_page( 'edit-comments.php' );          //Comments



        // remove_menu_page( 'themes.php' );                 //Appearance



        // remove_menu_page( 'plugins.php' );                //Plugins



        // remove_menu_page( 'users.php' );                  //Users



        // remove_menu_page( 'tools.php' );                  //Tools



        // remove_menu_page( 'options-general.php' );        //Settings



    }



    function wp_before_admin_bar_render() {



        echo '



            <style type="text/css">



            	[for="dashboard_php_nag-hide"],



            	#dashboard_php_nag,



            	#menu-appearance .wp-submenu > li:nth-child(4),



            	#menu-appearance .wp-submenu > li:nth-child(4) ~ li,



            	#toplevel_page_wp-mail-smtp,



                #wp-admin-bar-comments,



                #wp-admin-bar-new-content,



                #wp-admin-bar-updates,



                .wp_welcome_panel-hide,



                #wp-admin-bar-wp-logo,



                #wpfooter,



                .updated.success.fs-notice.fs-has-title.fs-slug-widgets-for-siteorigin.fs-type-plugin,



                #footer-upgrade,



                #welcome-panel{



                    display: none !important;



                }



            </style>



        ';



                #toplevel_page_wpcf7,







    }



    add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);



    remove_action('welcome_panel', 'wp_welcome_panel');



    add_filter('acf/settings/show_admin', '__return_false');



    add_action('wp_before_admin_bar_render', 'wp_before_admin_bar_render');



    function disable_default_dashboard_widgets() {



        remove_meta_box('dashboard_right_now', 'dashboard', 'core');



        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');



        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');



        remove_meta_box('dashboard_plugins', 'dashboard', 'core');







        remove_meta_box('dashboard_quick_press', 'dashboard', 'core');



        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');



        remove_meta_box('dashboard_primary', 'dashboard', 'core');



        remove_meta_box('dashboard_secondary', 'dashboard', 'core');



    }



    add_action('admin_menu', 'disable_default_dashboard_widgets');



    if( function_exists('acf_add_local_field_group') ):



        acf_add_local_field_group(array(



            'key' => 'group_5c8cea882a553',



            'title' => 'Paginas',



            'fields' => false,



            'location' => array(



                array(



                    array(



                        'param' => 'post_type',



                        'operator' => '==',



                        'value' => 'page',



                    ),



                ),



            ),



            'menu_order' => 0,



            'position' => 'side',



            'style' => 'seamless',



            'label_placement' => 'top',



            'instruction_placement' => 'label',



            'hide_on_screen' => array(



                0 => 'discussion',



                1 => 'comments',



                2 => 'revisions',



                3 => 'slug',



                4 => 'author',



                5 => 'format',



                6 => 'tags',



                7 => 'send-trackbacks',



            ),



            'active' => 1,



            'description' => '',



        ));



    endif;



    function remove_customizer_settings( $wp_customize ){



        $wp_customize->remove_section('static_front_page');



    }



    function hide_admin_bar() {



        wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');



        return false;



    }



    function mytheme_remove_help_tabs($old_help, $screen_id, $screen){



        $screen->remove_help_tabs();



        return $old_help;



    }    