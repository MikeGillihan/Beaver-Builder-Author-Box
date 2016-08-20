<?php
defined( 'WPINC' ) or die;

/**
 * Convenience methods
 *
 * Includes WP Stack plugin library (credit: Mark Jaquith - https://github.com/markjaquith)
 * and other helpful methods we use often.
 */
if ( !class_exists( 'WP_Helpers' ) ) {
	class WP_Helpers {
		public function hook( $hook ) {
			$priority = 10;
			$method = $this->sanitize_method( $hook );
			$args = func_get_args();
			unset( $args[0] );
			foreach( (array) $args as $arg ) {
				if ( is_int( $arg ) )
					$priority = $arg;
				else
					$method = $arg;
			}
			return add_action( $hook, array( $this, $method ), $priority, 999 );
		}

		// public function filter( $hook ) {
		// 	$priority = 10;
		// 	$method = $this->sanitize_method( $hook );
		// 	$args = func_get_args();
		// 	unset( $args[0] );
		// 	foreach( (array) $args as $arg ) {
		// 		if ( is_int( $arg ) )
		// 			$priority = $arg;
		// 		else
		// 			$method = $arg;
		// 	}
		// 	return add_filter( $hook, array( $this, $method ), $priority, 999 );
		// }

		private function sanitize_method( $method ) {
			return str_replace( array( '.', '-' ), array( '_DOT_', '_DASH_' ), $method );
		}

		/**
		 * Find a string in a file
		 *
		 * @param   string  $pattern  The pattern to search for.
		 * @param   file  	$subject  The file to search
		 *
		 * @return  string            The matched string
		 */
		public function match_string( $pattern, $subject ) {

			preg_match( $pattern, $subject, $matches );

			$match = $matches[0];

			return $match;
		}

		/**
		* Rename top level admin menus
		*
		* @since  0.3.0
		* @param  string $original The current menu label text
		* @param  string $new      The new menu label text
		* @return string           Top level admin menu label
		*/
		public function rename_menu( $original, $new ) {
			global $menu;

			foreach( $menu AS $k => $v ) {
				if( $original == $v[0] ) {
					$menu[$k][0] = $new;
				}
			}
		}

		/**
		* Is User Role
		*
		* Checks if the current user has a role.
		* Returns true if a match is found.
		*
		* @credit Based on post by David Cowgill on AppThemes
		* @source https://docs.appthemes.com/tutorials/wordpress-check-user-role-function/
		*
		* @since  0.4.0
		* @deprecated 0.7.0 Use current_user_can() instead
		* @param  string $role Role name.
		* @return bool
		*/
		public function is_user_role( $role ) {
			$user = wp_get_current_user();
			return in_array( $role, (array) $user->roles );
		}
	}
}
