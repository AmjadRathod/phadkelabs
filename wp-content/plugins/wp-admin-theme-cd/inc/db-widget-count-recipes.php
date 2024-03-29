<?php 

/*****************************************************************/
/* WP COUNT RECIPES DASHBOARD WIDGET */
/*****************************************************************/

// WP COUNT RECIPES WIDGET --> CALLABLE WIDGET CONTENT

if( ! function_exists('wp_admin_count_recipes_widget_content') ) :

    function wp_admin_count_recipes_widget_content() { 

        $count_recipes = wp_count_posts('recipe');
        $published = $count_recipes->publish;
		if( is_rtl() ) {
			$draft = esc_html__( 'Draft', 'wp-admin-theme-cd' ) . ' ' . $count_recipes->draft;
			$pending = esc_html__( 'Pending', 'wp-admin-theme-cd' ) . ' ' . $count_recipes->pending;
			$private = esc_html__( 'Private', 'wp-admin-theme-cd' ) . ' ' . $count_recipes->private;
			$future = esc_html__( 'Future', 'wp-admin-theme-cd' ) . ' ' . $count_recipes->future; 
		} else {
			$draft = $count_recipes->draft . ' ' . esc_html__( 'Draft', 'wp-admin-theme-cd' );
			$pending = $count_recipes->pending . ' ' . esc_html__( 'Pending', 'wp-admin-theme-cd' );
			$private = $count_recipes->private . ' ' . esc_html__( 'Private', 'wp-admin-theme-cd' );
			$future = $count_recipes->future . ' ' . esc_html__( 'Future', 'wp-admin-theme-cd' );
		} ?>

        <style>
            .wpat-post-count {margin:0px -15px -15px -15px;text-align:center;}
            .wpat-post-count-focus {line-height:normal;color:#82878c;font-size:40px;border-bottom:1px solid #eee;padding-bottom:20px}
            .wpat-post-count-focus .wpat-post-count-num {display:inline-block}
            .wpat-post-count-focus .wpat-post-count-num ~ div {font-size:16px;font-weight:100;width:100%}
            .wpat-post-count-detail {background:#f8f9fb;padding:12px}
        </style>

        <div class="wpat-post-count">
            <div class="wpat-post-count-focus">
                <div class="wpat-post-count-num">
                    <?php echo esc_html( $published ); ?>
                </div>
                <div><?php esc_html_e( 'Published Recipes', 'wp-admin-theme-cd' ); ?></div>
            </div>
            <div class="wpat-post-count-detail">
                <?php echo esc_html( $draft ) . ' | ' .  esc_html( $pending ) . ' | ' .  esc_html( $private ) . ' | ' .  esc_html( $future ); ?>
            </div>
            
        </div>

    <?php }

endif;

// WP COUNT RECIPES WIDGET --> ADD DASHBOARD WIDGET

if( ! function_exists('wp_admin_count_recipes_widget') ) :

	function wp_admin_count_recipes_widget() {

		wp_add_dashboard_widget('wp_count_recipes_db_widget', esc_html__( 'Recipes', 'wp-admin-theme-cd' ), 'wp_admin_count_recipes_widget_content');

	}

endif;

add_action('wp_dashboard_setup', 'wp_admin_count_recipes_widget');