<?php
/**
 * Manages hiding posts that have some hide option enabled.
 *
 * @package  wordpress-hide-posts
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WHP_Post_Hide class.
 */
class WHP_Post_Hide {
	/**
	 * Function: __construct
	 *
	 */
	public function __construct() {
		add_action( 'pre_get_posts', array( $this, 'exclude_posts') );
	}

	/**
	 * Exclude posts with enabled hide options
	 *
	 * @param  WP_Query $query Current query object.
	 *
	 * @return void
	 */
	public function exclude_posts( $query ) {
		global $post;

		if ( ! is_admin() ) {
			// Hide on homepage.
			if ( ( is_front_page() && is_home() ) || is_front_page() ) {
				$query->set( 'meta_key', '_whp_hide_on_frontpage' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			} else if ( is_home() ) {
				// Hide on static blog page.
				$query->set( 'meta_key', '_whp_hide_on_blog_page' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}

			// Hide on Categories.
			if ( is_category() ) {
				$query->set( 'meta_key', '_whp_hide_on_categories' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}

			// Hide on Search.
			if ( is_search() ) {
				$query->set( 'meta_key', '_whp_hide_on_search' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}

			// Hide on Tags.
			if ( is_tag() ) {
				$query->set( 'meta_key', '_whp_hide_on_tags' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}

			// Hide on Authors.
			if ( is_author() ) {
				$query->set( 'meta_key', '_whp_hide_on_authors' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}

			// Hide in RSS Feed.
			if ( is_feed() ) {
				$query->set( 'meta_key', '_whp_hide_in_rss_feed' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}

			// Hide in Store.
			if ( whp_wc_exists() && is_shop() ) {
				$query->set( 'meta_key', '_whp_hide_on_store' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}

			// Hide on Product categories.
			if ( whp_wc_exists() && is_product_category() ) {
				$query->set( 'meta_key', '_whp_hide_on_product_category' );
				$query->set( 'meta_compare', 'NOT EXISTS' );
			}
		}
	}
}
