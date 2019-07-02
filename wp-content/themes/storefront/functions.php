<?php

$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];



function testimonials_install() {
 
    // Trigger our function that registers the custom post type
    testimonials_create_post_type();
 
    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
 
}
// register_activation_hook( __FILE__, 'testimonials_install' );
function testimonials_deactivation() {
 
    // Our post type will be automatically removed, so no need to unregister it
 
    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
 
}
// register_deactivation_hook( __FILE__, 'testimonials_deactivation' );
function testimonials_stylesheet() {
    wp_enqueue_style( 'testimonials_bootstrap', plugins_url( '/bootstrap/css/bootstrap.min.css', __FILE__ ) );
    wp_enqueue_style( 'testimonials_style', plugins_url( '/css/style.css', __FILE__ ) );
}
// add_action( 'wp_enqueue_scripts', 'testimonials_stylesheet' );
function testimonials_scripts(){
        
        
        wp_register_script('testimonials_bootstrap_js',plugin_dir_url( __FILE__ ).'/bootstrap/js/bootstrap.min.js', array('jquery'), true);
        wp_enqueue_script('testimonials_bootstrap_js');
        
}
add_action('wp_enqueue_scripts','testimonials_scripts');
add_filter('widget_text', 'do_shortcode');
function testimonial_set_custom_edit_testimonials_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['date'] );
    $columns['testimonials_image'] = __( 'Image', 'testimonials' );
    $columns['testimonials_company'] = __( 'Company', 'testimonials' );
    $columns['testimonials_website'] = __( 'Website', 'testimonials' );
    $columns['testimonials_shortcode'] = __( 'Shortcode', 'testimonials' );
    return $columns;
}
add_filter( 'manage_testimonials_posts_columns', 'testimonial_set_custom_edit_testimonials_columns' );

add_action( 'manage_testimonials_posts_custom_column' , 'testimonial_custom_testimonials_column', 10, 2 );

function testimonial_custom_testimonials_column( $column, $post_id ) {
    switch ( $column ) {
        case 'testimonials_image' :
            $testimonial_image_thumbnail = get_the_post_thumbnail( $post_id, array(150,150) );
            
            if ( is_string( $testimonial_image_thumbnail ) && !empty( $testimonial_image_thumbnail ) )
                echo $testimonial_image_thumbnail;
            else
                
                echo '<img src="'.get_template_directory_uri(). '/images/testimonial.png'.'" alt="Testimonial"/>';
            break;
        case 'testimonials_company':
            $meta_company = get_post_meta( get_the_ID(), '_testimonials_post_company', true );
            
            echo $meta_company;
        break;
        
        case 'testimonials_website':
            $meta_website = get_post_meta( get_the_ID(), '_testimonials_post_url', true );
            echo '<a href="' . $meta_website . '" tsrget="_blank" rel="nofollow">' . $meta_website . '</a>';
        break;
        case 'testimonials_shortcode' :
            echo '[testimonials ids="' . $post_id . '"]';
            break;
    }
}
function testimonials_shortcode($atts, $content=null){
   
    extract(shortcode_atts(array(
        'ids' => '',
        'category' => '',
        'count' => '',
        'order' => 'DESC',
        'orderby' => 'menu_order',
        
    ), $atts)); 
    
    $args = array();
    
    //All Testimonials [testimonials]
    if(!$ids && !$count && !$category){
        $args=array(
            
            'post_type' => 'testimonials',
            'order' => $order,
            'orderby' => $orderby,
            
        );
    }
    
    //Testimonials ids [testimonials ids="1,2,3,5"]
    if( $ids && !$category ){
        $cids = explode(',', $ids);
        $aids = array();
        foreach($cids as $key => $value){   
            $aids[] = $value;
        }
        $count = count($cids);
        $args['post__in'] = implode(',', $aids);
        
        $args=array(
            
            'post_type' => 'testimonials',
            'post__in' => $aids,
            'posts_per_page' => intval($count),
            'order' => $order,
            'orderby' => $orderby,
        );
    }
    
    //Testimonials ids [testimonials ids="1,2,3,5" category="customers"]
    if( $ids && $category ){
        $cids = explode(',', $ids);
        $aids = array();
        foreach($cids as $key => $value){   
            $aids[] = $value;
        }
        $count = count($cids);
        $args['post__in'] = implode(',', $aids);
        
        $args=array(
            
            'post_type' => 'testimonials',
            'post__in' => $aids,
            'posts_per_page' => intval($count),
            'order' => $order,
            'orderby' => $orderby,
            'tax_query' => array(
            'relation' => 'OR',
                array(
                    'taxonomy' => 'testimonials_cat',
                    'field'    => 'slug',
                    'terms'    => array( $atts['category'] ),
                ),
            ),
        );
    }
    
    //Testimonials ids [testimonials count="3"]
    if( $count && !$category ){
        
        $args=array(
            
            'post_type' => 'testimonials',
            'posts_per_page' => intval($count),
            'order' => $order,
            'orderby' => $orderby,
            
        );
    }
    
    //Testimonials ids [testimonials count="3" category="customers"]
    if( $count && $category ){
        
        
        $args=array(
            
            'post_type' => 'testimonials',
            'posts_per_page' => intval($count),
            'order' => $order,
            'orderby' => $orderby,
            'tax_query' => array(
            'relation' => 'OR',
                array(
                    'taxonomy' => 'testimonials_cat',
                    'field'    => 'slug',
                    'terms'    => array( $atts['category'] ),
                ),
            ),
        );
    }
    
    //Testimonials ids [testimonials category="customers"]
    if( !$count && $category ){
        
        
        $args=array(
            
            'post_type' => 'testimonials',
            'order' => $order,
            'orderby' => $orderby,
            'tax_query' => array(
            'relation' => 'OR',
                array(
                    'taxonomy' => 'testimonials_cat',
                    'field'    => 'slug',
                    'terms'    => array( $atts['category'] ),
                ),
            ),
        );
    }
        
    $query = new WP_Query($args);
    
    if(!$count){
        $count = $query->post_count;
    }
    $html = '';
    
    if ($query->have_posts()){ 
    
    $html = '<div class="carousel-testimonials">
    
                <div class="row">
                <div class="col-md-offset-2 col-md-8">
                <div class="carousel slide" data-ride="carousel" id="testimonial-carousel-' . $category . '">
                
                <ol class="carousel-indicators">';
            
                
                for($i=0;$i<$count;$i++){
                   if($i == 0){
                        $html .= '<li data-target="#testimonial-carousel-' . $category .'" data-slide-to="0" class="active"></li>';
                    }else{
                        $html .='<li data-target="#testimonial-carousel-' . $category .'" data-slide-to="'.$i.'"></li>';
                    }
                }
                $html .='</ol>
        
        <div class="carousel-inner">';
        $m = 0;
        
        while($query->have_posts()){    
                    
            $query->the_post();
            $testimonial_imgArray = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ));
            $testimonial_imgURL = $testimonial_imgArray[0];
            
            $meta_company = get_post_meta( get_the_ID(), '_testimonials_post_company', true );
            $meta_website = get_post_meta( get_the_ID(), '_testimonials_post_url', true );
                                    
            if($m == 0){
                $class = 'item active';
            }else{
                $class = 'item';
            }
          
          $html .= '<div class="'.$class.'">
                    <blockquote>
                      <div class="row">
                        <div class="col-sm-3 text-center">';
                        if(!empty($testimonial_imgURL)){  
                            $html .='<img alt="'. get_the_title() .'" class="attachment-small wp-post-image" src="' .$testimonial_imgURL.'" title="'. get_the_title() .'" />';
                        }else{ 
                            $html .='<img alt="'. get_the_title() .'" class="attachment-small wp-post-image" src="' .get_template_directory_uri(). '/images/testimonial.png'. '"title="'. get_the_title() .'" />';
                        }
                        $html .= '</div>';
                        $html .= '<div class="col-sm-9">';
                        $html .= '<p>' . get_the_content() . '</p>';
                        $html .=  '<cite>' . get_the_title();
                        
                        if($meta_company){
                            $html .= ' : ' . $meta_company;
                        }
                        if($meta_website){
                            $html .= ' : ' . $meta_website;
                        }
                         $html .= '</cite>
                        </div>
                      </div>
                    </blockquote>
          </div>';
          $m++;
        }
        $html .= '</div>
        
        
        <a data-slide="prev" href="#testimonial-carousel-' . $category .'" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#testimonial-carousel-' . $category .'" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>                          
    </div>
    </div>
</div>';
    
    }
    
    wp_reset_query();
    
    return $html;
    
}
add_shortcode('testimonials', 'testimonials_shortcode');            
add_action('admin_menu' , 'testimonials_help_admin_menu'); 
function testimonials_help_admin_menu() {
    add_submenu_page('edit.php?post_type=testimonials', __('Help', 'testimonials'), __('Help', 'testimonials'), 'administrator', basename(__FILE__), 'testimonials_help_page'); 
}
        
function testimonials_help_page() { ?>

        <div id="custom-branding-general" class="wrap">
                
                <h2><?php esc_html_e('Help  Testimonials','testimonials'); ?></h2>
            <div class="metabox-holder">
                <div class="postbox">
                <div class="inside">
                    <p><?php _e('For  Testimonials to work you have to create a Testimonial Category then create a Testimonial over Add New Testimonial','testimonials'); ?></p>
                    <hr>
                    <p><?php _e('Type of shortcodes:','testimonials'); ?></p>
                    <p><?php _e('Pages and Posts','testimonials'); ?></p>
                    
                    <p><?php _e('Show all testimonials: <strong>[testimonials]</strong>','testimonials'); ?></p>
                    
                    <p><?php _e('Show "x" testimonials: <strong>[testimonials count="x"]</strong> ,where "x" is a number <strong>[testimonials count="3"]</strong>','testimonials'); ?></p>
                    
                    <p><?php _e('Show all testimonials of one "category" : <strong>[testimonials category="customers"]</strong> ,where "customers" is a category created on Testimonials category','testimonials'); ?></p>
                    <p><?php _e('Combined show "x" testimonials of one "category" : <strong>[testimonials count="x" category="customers"]</strong> ,where "x" is a number and "customers" is a category created on Testimonial category','testimonials'); ?></p>
                    
                    <ol>
                        <li><strong>[testimonials]</strong> Display All Testimonials</li>
                        <li><strong>[testimonials count="3"]</strong> Display 3 Testimonials of the selected category on Home page</li>
                        <li><strong>[testimonials category="customers"]</strong> Display All Testimonials of "Customers"</li>
                        <li><strong>[testimonials count="2" category="customers"]</strong> Display 2 Testimonials of "Customers" Category</li>
                        <li><strong>[testimonials category="customers" ids="1,3,6"]</strong> Display All selected "ids" Testimonials of "Customers"</li>
                    </ol>
            
                </div>
            </div>
        </div>
        </div>
<?php 
}
    
if( ! function_exists( 'testimonials_create_post_type' ) ) :
    function testimonials_create_post_type() {
        
        $labels = array(
        'name'                => _x( ' Testimonials', 'Post Type General Name', 'testimonials' ),
        'singular_name'       => _x( 'testimonials', 'Post Type Singular Name', 'testimonials' ),
        'menu_name'           => __( ' Testimonials', 'testimonials' ),
        'name_admin_bar'      => __( ' Testimonials', 'testimonials' ),
        'parent_item_colon'   => __( 'Parent testimonial:', 'testimonials' ),
        'all_items'           => __( 'All testimonials', 'testimonials' ),
        'add_new_item'        => __( 'Add testimonial', 'testimonials' ),
        'add_new'             => __( 'Add New', 'testimonials' ),
        'new_item'            => __( 'New testimonial', 'testimonials' ),
        'edit_item'           => __( 'Edit testimonial', 'testimonials' ),
        'update_item'         => __( 'Update testimonial', 'testimonials' ),
        'view_item'           => __( 'View testimonial', 'testimonials' ),
        'search_items'        => __( 'Search testimonial', 'testimonials' ),
        'not_found'           => __( 'Testimonials Not found', 'testimonials' ),
        'not_found_in_trash'  => __( 'Testimonials Not found in Trash', 'testimonials' ),
    );
    
    $args = array(
        'label'               => __( ' Testimonials', 'testimonials' ),
        'description'         => __( ' ', 'testimonials' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-testimonial',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'rewrite'             => true,
        'has_archive'         => true, //TODO
        'exclude_from_search' => false, //true show on query search
        'publicly_queryable'  => true,
        'query_var' => true,
        'capability_type'     => 'post',
        'register_meta_box_cb' => 'testimonials_add_post_type_metabox'
    );
        register_post_type( 'testimonials', $args );
        //flush_rewrite_rules();
 
        register_taxonomy( 'testimonials_cat', // register custom taxonomy - category
            'testimonials',
            array(
                'hierarchical' => true,
                'show_in_nav_menus'   => true,
                'labels' => array(
                    'name' => 'Testimonials category',
                    'singular_name' => 'testimonials category',
                )
            )
        );
        
    }
    
    
    add_action( 'init', 'testimonials_create_post_type' );
 
 
    function testimonials_add_post_type_metabox() { // add the meta box
        add_meta_box( 'testimonials_metabox', 'Additionl information about this testimonial', 'testimonials_metabox', 'testimonials', 'normal' );
    }
 
    function testimonials_metabox() {
        global $post;
        echo '<input type="hidden" name="testimonials_post_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
        $testimonials_post_company = get_post_meta($post->ID, '_testimonials_post_company', true);
        $testimonials_post_url = get_post_meta($post->ID, '_testimonials_post_url', true);
        
        echo '<table class="form-table">
            <tr>
                <th>';
                ?>
                    <label><?php  _e('Company','testimonials'); ?></label>
                <?php
                echo '</th>
                <td>
                    <input type="text" name="testimonials_post_company" class="regular-text" value="' . $testimonials_post_company . '"> 
                </td>
            </tr>
            <tr>
                <th>';
                ?>
                    <label><?php _e('Website','testimonials'); ?></label>
                <?php
                echo '</th>
                <td>
                    <input type="text" name="testimonials_post_url" class="regular-text" value="' . $testimonials_post_url . '"> 
                </td>
            </tr>
            
        </table>';
    
    }
 
function testimonials_post_save_meta( $post_id, $post ) { // save the data
         if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;
 
        /*
         * We need to verify this came from our screen and with proper authorization,
         * because the save_post action can be triggered at other times.
         */
 
        if ( ! isset( $_POST['testimonials_post_noncename'] ) ) { // Check if our nonce is set.
            return;
        }
 
        if( !wp_verify_nonce( $_POST['testimonials_post_noncename'], plugin_basename(__FILE__) ) ) { // Verify that the nonce is valid.
            return $post->ID;
        }
 
        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if( !wp_verify_nonce( $_POST['testimonials_post_noncename'], plugin_basename(__FILE__) ) ) {
            return $post->ID;
        }
 
        // is the user allowed to edit the post or page?
        if( ! current_user_can( 'edit_post', $post->ID )){
            return $post->ID;
        }
        // ok, we're authenticated: we need to find and save the data
        // we'll put it into an array to make it easier to loop though
 
        $testimonials_post_meta['_testimonials_post_company'] = $_POST['testimonials_post_company'];
        $testimonials_post_meta['_testimonials_post_url'] = $_POST['testimonials_post_url'];
 
        // add values as custom fields
        foreach( $testimonials_post_meta as $key => $value ) { // cycle through the $testimonials_post_meta array
            $value = implode(',', (array)$value); // if $value is an array, make it a CSV (unlikely)
            if( get_post_meta( $post->ID, $key, FALSE ) ) { // if the custom field already has a value
                update_post_meta($post->ID, $key, $value);
            } else { // if the custom field doesn't have a value
                add_post_meta( $post->ID, $key, $value );
            }
            if( !$value ) { // delete if blank
                delete_post_meta( $post->ID, $key );
            }
        }
    }
    add_action( 'save_post', 'testimonials_post_save_meta', 1, 2 ); // save the custom fields
endif; // end of function_exists()








//automatic discount
add_action('woocommerce_before_calculate_totals', 'discount_based_on_quantity_threshold');
function discount_based_on_quantity_threshold( $cart ) {
   
    $coupon_code      = 'NEW10'; // Coupon code
    $quantity_threshold=2;

    // Initializing variables
    $total_quantity     = $cart->get_cart_contents_count();
    $applied_coupons  = $cart->get_applied_coupons();
   // $coupon_code      = sanitize_text_field( $coupon_code );

    // Applying coupon
    if( ! in_array($coupon_code, $applied_coupons) && $total_quantity >= 2 ){
        $cart->apply_coupon( $coupon_code );
global $woocommerce;
if (!$woocommerce->cart->apply_coupon( sanitize_text_field( $coupon_code ))) {
wc_clear_notices();


            
        }


    }
    // Removing coupon
   

if( ! in_array($coupon_code, $applied_coupons) && $total_quantity < 2 ){
        $cart->remove_coupon( $coupon_code );

    }


}




add_action( 'wp_footer', 'coupon_removed_script' );
function coupon_removed_script() {
    if( is_cart() || ( is_checkout() && ! is_wc_endpoint_url() ) ):
    ?>
        <script type="text/javascript">
        jQuery(function($){
            $('a.woocommerce-remove-coupon').on( 'click', function(){
                console.log('click remove coupon');
                alert('click remove coupon');
            });
        })
        </script>
    <?php
    endif;
}










/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
$content_width = 980; /* pixels */
}

$storefront = (object) array(
// 'version'    => $storefront_version,

/**
* Initialize all the things.
*/
'main'       => require 'inc/class-storefront.php',
'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
$storefront->admin = require 'inc/admin/class-storefront-admin.php';

require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
require 'inc/nux/class-storefront-nux-admin.php';
require 'inc/nux/class-storefront-nux-guided-tour.php';
if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
require 'inc/nux/class-storefront-nux-starter-content.php';
}
}

  function vijay_fun(){
      echo "<h1>Hi! vijay</h1>";
  }

  add_shortcode('vijay','vijay_fun');
/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
