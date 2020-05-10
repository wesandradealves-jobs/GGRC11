<?php

    function customizer( $wp_customize ) {

            $wp_customize->add_panel( 'customization', array(

                'priority'       => 2,

                'title'          => __('Customização')

            ));

            // $wp_customize->add_section( 'general' , array(

            //     'title'       => __( 'General' ),

            //     'panel' => 'customization',

            //     'priority'    => 10

            // ));

            $wp_customize->add_section( 'header' , array(

                'title'       => __( 'Header' ),

                'panel' => 'customization',

                'priority'    => 1

            ));

            $wp_customize->add_section( 'footer' , array(

                'title'       => __( 'Footer' ),

                'panel' => 'customization',

                'priority'    => 1

            ));

            $wp_customize->add_section( 'contato' , array(

                'title'       => __( 'Contato' ),

                'panel' => 'customization',

                'priority'    => 1

            ));            

            // $wp_customize->add_setting( 'logo_footer' );

            // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer', array(

            // 'label'    => __( 'Logo' ),

            // 'section'  => 'footer',

            // 'settings' => 'logo_footer'

            // )));

            $wp_customize->add_setting( 'logo' );

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(

            'label'    => __( 'Logo (Padrão)' ),

            'section'  => 'header',

            'settings' => 'logo'

            )));

            $wp_customize->add_setting( 'logo_negativo' );

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_negativo', array(

            'label'    => __( 'Logo (Negativo)' ),

            'section'  => 'header',

            'settings' => 'logo_negativo'

            )));    

            $wp_customize->add_setting( 'fundo' );

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fundo', array(

            'label'    => __( 'Fundo' ),

            'section'  => 'footer',

            'settings' => 'fundo'

            )));                     

            $wp_customize->add_setting('texto');

            $wp_customize->add_control('texto',  array(

                'label' => 'Texto',

                'section' => 'footer',

                'type' => 'textarea',

                'settings' => 'texto'

            ));

            $wp_customize->add_setting( 'logo_rodape' );

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_rodape', array(

            'label'    => __( 'Logo' ),

            'section'  => 'footer',

            'settings' => 'logo_rodape'

            )));               

            $wp_customize->add_setting('email');

            $wp_customize->add_control('email',  array(

                'label' => 'E-mail',

                'section' => 'contato',

                'type' => 'text',

                'settings' => 'email'

            ));   

            $wp_customize->add_setting('telefone');

            $wp_customize->add_control('telefone',  array(

                'label' => 'Telefone',

                'section' => 'contato',

                'type' => 'text',

                'settings' => 'telefone'

            ));      

            $wp_customize->add_setting('endereco');

            $wp_customize->add_control('endereco',  array(

                'label' => 'Endereço',

                'section' => 'contato',

                'type' => 'textarea',

                'settings' => 'endereco'

            ));                                 

            $social_networks = array(

                array(

                    'title' => 'Linkedin',

                    'slug' => 'linkedin'

                ),

                array(

                    'title' => 'Twitter',

                    'slug' => 'twitter'

                ),

                array(

                    'title' => 'Instagram',

                    'slug' => 'instagram'

                ),

            );

            if(!empty($social_networks)){

                $wp_customize->add_section( 'social_networks' , array(

                    'title'       => __( 'Social Networks' ),

                    'panel' => 'customization',

                    'priority'    => 0

                ));

                foreach ($social_networks as $key => $value) {

                    $wp_customize->add_setting($value['slug']);

                    $wp_customize->add_control($value['slug'],  array(

                        'label' => $value['title'],

                        'section' => 'social_networks',

                        'type' => 'text',

                        'settings' => $value['slug']

                    ));

                }

            }

    }	