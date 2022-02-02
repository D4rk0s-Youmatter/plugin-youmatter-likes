<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       Jérémie Gisserot
 * @since      1.0.0
 *
 * @package    ym_likes
 * @subpackage ym_likes/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ym_likes
 * @subpackage ym_likes/admin
 * @author     HD Team <jeremie@labubulle.com>
 */
class ym_likes_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ym_likes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ym_likes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ym-likes-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ym_likes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ym_likes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        if( 'index.php' != $hook ) return;

        wp_enqueue_script( $this->plugin_name . "_admin", plugin_dir_url( __FILE__ ) . 'js/ym-likes-admin.js', array( 'jquery' ), $this->version, false );
        wp_localize_script( $this->plugin_name . "_admin", 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => "huhu" ) );

        //add_action('wp_ajax_set_post_likes', array($this, 'set_posts_likes'));
        //add_action('wp_ajax_nopriv_set_post_likes', array($this, 'set_posts_likes'));

    }
    /*
    public function set_posts_likes() {

        if( isset( $_POST['ymli_post_id'] )  && isset( $_POST['ymli_likes'] )  ) {
                
            $likes = get_post_meta($_POST['ymli_post_id'], 'ymli_likes', true);
            if($_POST['ymli_likes'] == 'like') {
                $newLikes = $likes++;
                update_post_meta($_POST['ymli_post_id'], 'ymli_likes', $newLikes);
            } else {
                $newLikes = $likes--;
                update_post_meta($_POST['ymli_post_id'], 'ymli_likes', $newLikes);
            }

        }
        return "huhu";
    }
    */

}
