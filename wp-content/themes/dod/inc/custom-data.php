<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class DOD_Admin {
	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'dod_options';
	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'dod_option_metabox';
	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';
	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';
	/**
	 * Constructor
	 * @since 0.1.0
	 */
	public function __construct() {
		// Set our title
		$this->title = __( 'Site Options', 'dod' );
	}
	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'init', array( $this, 'custom_post_types' ) );
		add_action( 'cmb2_admin_init', array( $this, 'cmb2_dog_metaboxes' ) );
		add_action( 'cmb2_admin_init', array( $this, 'cmb2_form_metaboxes' ) );
		add_action( 'cmb2_admin_init', array( $this, 'cmb2_sponsor_metaboxes' ) );
	}
	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Create custom post types
	 */
	public function custom_post_types() {
		// Set up custom post types
		
		// Dog post type
		$dogs_labels = array(
			'add_new'            => _x( 'Add New', 'dog', 'ps' ),
			'add_new_item'       => __( 'Add New Dog', 'ps' ),
			'all_items'          => __( 'All Dogs', 'ps' ),
			'edit_item'          => __( 'Edit Dog', 'ps' ),
			'menu_name'          => _x( 'Dogs', 'admin menu', 'ps' ),
			'name_admin_bar'     => _x( 'Dog', 'add new on admin bar', 'ps' ),
			'name'               => _x( 'Dogs', 'post type general name', 'ps' ),
			'new_item'           => __( 'New Dog', 'ps' ),
			'not_found'          => __( 'No Dogs found.', 'ps' ),
			'not_found_in_trash' => __( 'No Dogs found in Trash.', 'ps' ),
			'parent_item_colon'  => __( 'Parent Dog:', 'ps' ),
			'search_items'       => __( 'Search Dogs', 'ps' ),
			'singular_name'      => _x( 'Dog', 'post type singular name', 'ps' ),
			'view_item'          => __( 'View Dog', 'ps' ),
		);

		$dogs_args = array(
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'labels'             => $dogs_labels,
			'menu_icon'          => 'dashicons-admin-users',
			'menu_position'      => null,
			'public'             => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug' => 'dogs',
			),
			'show_ui'            => true,
			'show_in_menu'       => true,
			'supports'           => array(
				'title',
			),
		);

		// Dog post type
		$sponsors_labels = array(
			'add_new'            => _x( 'Add New', 'sponsor', 'ps' ),
			'add_new_item'       => __( 'Add New Sponsor', 'ps' ),
			'all_items'          => __( 'All Sponsors', 'ps' ),
			'edit_item'          => __( 'Edit Sponsor', 'ps' ),
			'menu_name'          => _x( 'Sponsors', 'admin menu', 'ps' ),
			'name_admin_bar'     => _x( 'Sponsor', 'add new on admin bar', 'ps' ),
			'name'               => _x( 'Sponsors', 'post type general name', 'ps' ),
			'new_item'           => __( 'New Sponsor', 'ps' ),
			'not_found'          => __( 'No Sponsors found.', 'ps' ),
			'not_found_in_trash' => __( 'No Sponsors found in Trash.', 'ps' ),
			'parent_item_colon'  => __( 'Parent Sponsor:', 'ps' ),
			'search_items'       => __( 'Search Sponsors', 'ps' ),
			'singular_name'      => _x( 'Sponsor', 'post type singular name', 'ps' ),
			'view_item'          => __( 'View Sponsor', 'ps' ),
		);

		$sponsors_args = array(
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'labels'             => $sponsors_labels,
			'menu_icon'          => 'dashicons-admin-users',
			'menu_position'      => null,
			'public'             => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug' => 'sponsors',
			),
			'show_ui'            => true,
			'show_in_menu'       => true,
			'supports'           => array(
				'title',
			),
		);

		register_post_type( 'dogs', $dogs_args );
		register_post_type( 'sponsors', $sponsors_args );
	}
	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}
		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'dod' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}
	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}
		throw new Exception( 'Invalid property: ' . $field );
	}


	/****
	 ** CMB2 Custom Fields
	****/

	function cmb2_form_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_dod-form_';

		/****
		 ** Initiate the metabox
		****/
		$cmb_form = new_cmb2_box( array(
			'id'            => 'form_metabox',
			'title'         => __( 'Form Metabox', 'cmb2' ),
			'object_types'  => array( 'page', ), // Post type
			'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/page-secondary.php' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true, // Show field names on the left
			'object_types'  => array( 'page' ), // Post type
		) );

		// Text field
		$cmb_form->add_field( array(
			'name'       => __( 'Calendar Shortcode', 'cmb2' ),
			'id'         => $prefix . 'calendar',
			'type'       => 'text',
		) );

		// Text field
		$cmb_form->add_field( array(
			'name'       => __( 'Form Shortcode', 'cmb2' ),
			'id'         => $prefix . 'form',
			'type'       => 'text',
		) );
	}


	function cmb2_sponsor_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_dod-sponsors_';

		/****
		 ** Initiate the metabox
		****/
		$cmb_sponsors = new_cmb2_box( array(
			'id'            => 'sponsor_metabox',
			'title'         => __( 'Sponsor Metabox', 'cmb2' ),
			'object_types'  => array( 'page', ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true, // Show field names on the left
			'object_types'  => array( 'sponsors' ), // Post type
		) );

		// Text field
		$cmb_sponsors->add_field( array(
			'name'       => __( 'Description', 'cmb2' ),
			'id'         => $prefix . 'description',
			'type'       => 'wysiwyg',
		) );


		// Text field
		$cmb_sponsors->add_field( array(
			'name'       => __( 'Link', 'cmb2' ),
			'id'         => $prefix . 'link',
			'type'       => 'text_url',
		) );


		$cmb_sponsors->add_field( array(
			'name'    => 'Photo/Logo',
			'desc'    => 'Upload an image or enter an URL.',
			'id'      => $prefix . 'logo',
			'type'    => 'file',
			'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			'attributes'  => array(
		 		'required'    => 'required',
		 	),
		) );
	}

	function cmb2_dog_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_dod_';

		/****
		 ** Initiate the metabox
		****/
		$cmb_dogs = new_cmb2_box( array(
			'id'            => 'dog_metabox',
			'title'         => __( 'Dog Metabox', 'cmb2' ),
			'object_types'  => array( 'page', ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true, // Show field names on the left
			'object_types'  => array( 'dogs' ), // Post type
		) );

		// Text field
		$cmb_dogs->add_field( array(
			'name'       => __( 'Breed', 'cmb2' ),
			'id'         => $prefix . 'breed',
			'type'       => 'text',
			'attributes'  => array(
		 		'required'    => 'required',
		 	),
		) );


		$cmb_dogs->add_field( array(
			'name'             => esc_html__( 'Age', 'cmb2' ),
			'id'               => $prefix . 'age',
			'type'             => 'select',
			'show_option_none' => false,
			'options'          => array(
				'Puppy' => esc_html__( 'Puppy', 'cmb2' ),
				'Young'   => esc_html__( 'Young', 'cmb2' ),
				'Adult'     => esc_html__( 'Adult', 'cmb2' ),
				'Senior'     => esc_html__( 'Senior', 'cmb2' ),
			),
			'attributes'  => array(
		 		'required'    => 'required',
		 	),
		) );

		$cmb_dogs->add_field( array(
			'name'             => esc_html__( 'Size', 'cmb2' ),
			'id'               => $prefix . 'size',
			'type'             => 'select',
			'show_option_none' => false,
			'options'          => array(
				'Small'   => esc_html__( 'Small', 'cmb2' ),
				'Medium'     => esc_html__( 'Medium', 'cmb2' ),
				'Large'     => esc_html__( 'Large', 'cmb2' ),
			),
			'attributes'  => array(
		 		'required'    => 'required',
		 	),
		) );

		$cmb_dogs->add_field( array(
			'name' => esc_html__( 'About', 'cmb2' ),
			'id'   => $prefix . 'about',
			'type' => 'wysiwyg',
			'attributes'  => array(
		 		'required'    => 'required',
		 	),
		) );

		$cmb_dogs->add_field( array(
			'name'         => esc_html__( 'Photos', 'cmb2' ),
			'desc'         => esc_html__( 'Upload or add multiple images.', 'cmb2' ),
			'id'           => $prefix . 'photos',
			'type'         => 'file_list',
			'query_args' => array( 'type' => 'image' ), // Only images attachment
			'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			'attributes'  => array(
		 		'required'    => 'required',
		 	),
		) );
	}

}
/**
 * Helper function to get/return the DOD_Admin object
 * @since  0.1.0
 * @return DOD_Admin object
 */
function DOD_admin() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new DOD_Admin();
		$object->hooks();
	}
	return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function DOD_get_option( $key = '' ) {
	return cmb2_get_option( DOD_admin()->key, $key );
}

// Get it started
DOD_admin();
