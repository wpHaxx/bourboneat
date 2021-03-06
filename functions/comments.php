<?php

namespace Bourboneat;

/**
 * Display navigation to next/previous comments when applicable.
 */
function comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_attr_e( 'Comment navigation', 'bourboneat' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_attr__( 'Older Comments', 'bourboneat' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', esc_url( $prev_link ) );
				endif;

				if ( $next_link = get_next_comments_link( esc_attr__( 'Newer Comments', 'bourboneat' ) ) ) :
					printf( '<div class="nav-next">%s</div>', esc_url( $next_link ) );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
add_action('comment_nav', __NAMESPACE__ . '\\comment_nav');