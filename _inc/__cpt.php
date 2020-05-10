<?php



    function cpt() {



        $post_types = array(



            // array(



            //     'title' => 'Relatório',



            //     'slug' => 'relatorios',



            //     'taxonomy' => false



            // ),



            array(



                'title' => 'Ativos Imobiliários',



                'slug' => 'ativos-imobiliarios',



                'taxonomy' => false



            ), 





            array(



                'title' => 'Downloads',



                'slug' => 'downloads',



                'taxonomy' => true



            ), 

            // array(



            //     'title' => 'Mercados',



            //     'slug' => 'mercados',



            //     'taxonomy' => false



            // )



        );



        foreach ($post_types as $key => $value) {



            if($value['taxonomy']){



                register_taxonomy( $value['slug'].'_categories', array( $value['slug'] ), array(



                    'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)



                    'labels'            => array(



                        'name'              => _x( 'Categorias', 'taxonomy general name' ),



                        'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),



                        'search_items'      => __( 'Buscar Categorias' ),



                        'all_items'         => __( 'Todas as Categorias' ),



                        'parent_item'       => __( 'Categoria Pai' ),



                        'parent_item_colon' => __( 'Categoria Pai:' ),



                        'edit_item'         => __( 'Editar categoria' ),



                        'update_item'       => __( 'Atualizar categoria' ),



                        'add_new_item'      => __( 'Adicionar nova categoria' ),



                        'new_item_name'     => __( 'Novo nome' ),



                        'menu_name'         => __( 'Categorias' ),



                    ),



                    'show_ui'           => true,



                    'show_admin_column' => true,



                    'query_var'         => true,



                    'show_in_rest'      => true,



                    'rewrite'           => array( 'slug' => $value['slug'] ),



                ));



            }



            register_post_type($value['slug'], array(



                'labels' => array(



                    'name' => _x($value['title'], 'post type general name'),



                    'singular_name' => _x($value['title'], 'post type singular name'),



                    'add_new' => _x('Novo', $value['title']),



                    'add_new_item' => __('Novo '.$value['title']),



                    'edit_item' => __('Editar '.$value['title']),



                    'new_item' => __('Novo '.$value['title']),



                    'view_item' => __('Ver '.$value['title']),



                    'search_items' => __('Buscar '.$value['title']),



                    'not_found' =>  __('Nada encontrado'),



                    'not_found_in_trash' => __('Nada encontrado'),



                    'parent_item_colon' => ''



                ),



                'exclude_from_search' => false, // the important line here!



                'public' => true,



                'publicly_queryable' => true,



                'show_ui' => true,



                'query_var' => true,



                'rewrite' => true,



                'show_in_nav_menus' => false,



                'capability_type' => 'post',



                'hierarchical' => false,



                'show_in_rest' => true,



                'rest_base' => 'produtos',



                'menu_position' => -2,



                'supports' => array('title','editor','thumbnail')



            ));



        }



    }







    cpt();