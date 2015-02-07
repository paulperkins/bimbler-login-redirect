<?php
/**
 * Bimbler RSVP
 *
 * @package   Bimbler_Login_Redirect
 * @author    Paul Perkins <paul@paulperkins.net>
 * @license   GPL-2.0+
 * @link      http://www.paulperkins.net
 * @copyright 2014 Paul Perkins
 */

/**
 * Include dependencies necessary... (none at present)
 *
 */

/**
 * Bimbler Login Redirect
 *
 * @package Bimbler_Login_Redirect
 * @author  Paul Perkins <paul@paulperkins.net>
 */
class Bimbler_Redirect {

        /*--------------------------------------------*
         * Constructor
         *--------------------------------------------*/

        /**
         * Instance of this class.
         *
         * @since    1.0.0
         *
         * @var      object
         */
        protected static $instance = null;

        /**
         * Return an instance of this class.
         *
         * @since     1.0.0
         *
         * @return    object    A single instance of this class.
         */
        public static function get_instance() {

                // If the single instance hasn't been set, set it now.
                if ( null == self::$instance ) {
                        self::$instance = new self;
                } // end if

                return self::$instance;

        } // end get_instance

        /**
         * Initializes the plugin by setting localization, admin styles, and content filters.
         */
        private function __construct() {

        	add_filter( 'login_redirect', array ($this, 'login_redirect'), 1, 3 );
        	         	
		} // End constructor.
	
	/**
	 * Redirect user after successful login.
	 *
	 * @param string $redirect_to URL to redirect to.
	 * @param string $request URL the user is coming from.
	 * @param object $user Logged user's data.
	 * @return string
	 */
	function login_redirect( $redirect_to, $request, $user ) {
		//is there a user to check?
		//global $user;
		if ( isset( $user->roles ) && is_array( $user->roles ) ) {
			//check for admins
			if ( in_array( 'administrator', $user->roles ) ) {
				// redirect them to the default place
				return $redirect_to;
			} else {
				return home_url();
			}
		} else {
			// Fix for NUA - if the user is not yet approved, un-set the $redirect_to 
			// to enable the 'you account is pending approval' message to be displayed.
			
			/*error_log (print_r ($user, true));
			$meta = get_user_meta ($user, 'pw_user_status', true);
			
			error_log ('User status is "' . $meta . '"');

			if (!isset($meta) || ('approved' == $meta)) {
					
				error_log ('Redirecting to "' . $redirect_to . '"'); */
			
				return $redirect_to;
/*			} else {
				error_log ('Un-setting redirect_to.');
					return null; 
			} */
		}
	}
	
		
} // End class
