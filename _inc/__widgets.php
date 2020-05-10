<?php
	if ( ! function_exists( 'the_widgets_init' ) ) {
		function the_widgets_init() {
			if ( ! function_exists( 'register_sidebars' ) )
            return;
			register_sidebar(
				array(
					'id'            => 'sidebar',
					'name'          => __( 'Sidebar' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="title-header"><h4 class="section-title"><strong>',
					'after_title'   => '</strong></h4></div>',
			));
		} // End the_widgets_init()
	}    