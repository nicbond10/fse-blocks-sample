<?php
/**
 * Renders the 'kanopi-current-date/kanopi-current-date' block
 * on the front-end.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/#render-callback
 */

// Get the user's chosen date format from WordPress settings
$date_format = get_option( 'date_format' );

// Get the current date, localized to the site's timezone
// and in the user's chosen format.
$current_date = wp_date( $date_format );

// get_block_wrapper_attributes() applies the necessary classes
// and styles to the block's wrapper element.
?>
<p <?= get_block_wrapper_attributes(); ?>>
	<?= esc_html( $current_date ); ?>
</p>