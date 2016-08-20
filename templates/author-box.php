<?php

/**
 * Author Box
 *
 * This file is used to markup the actual author box.
 *
 * @since 0.1.0
 */

$alt  = get_the_author();
$args = array(
	'class' => 'media-object'
	);
$author_archive       = get_author_posts_url( get_the_author_meta( 'ID' ) );
$author_avatar        = get_avatar( get_the_author_meta( 'ID' ), '', '', $alt, $args );
$author_bio           = get_the_author_meta( 'user_description' );
$author_display_name  = get_the_author_meta( 'display_name' );
$author_facebook      = get_the_author_meta( 'facebook' );
$author_twitter       = get_the_author_meta( 'twitter' );
$author_googleplus    = get_the_author_meta( 'googleplus' );
$author_website       = get_the_author_meta( 'url' );

		// If display name is not available then use nickname as display name
if ( empty( $author_display_name ) )
	$author_display_name = get_the_author_meta( 'nickname' );
?>

<div class="fl-author-bio clearfix media well">
	<div class="fl-author-bio-thumb media-left">
		<?php echo $author_avatar; ?>
	</div>
	<div class="fl-author-bio-text media-body">
		<h3 class="media-heading">About <a href="<?php $author_archive ?>"><?php echo $author_display_name; ?></a></h3>
		<p><?php echo $author_bio; ?></p>
		<div class="social-buttons">
			<?php if ( $author_facebook != '' ) { ?>
				<a href="<?php echo $author_facebook; ?>" class="fl-button btn btn-default btn-sm btn-facebook" role="button" target="_blank">Facebook</a>
			<?php }
			if ( $author_twitter != '' ) { ?>
				<a href="https://twitter.com/<?php echo $author_twitter; ?>" class="fl-button btn btn-default btn-sm btn-twitter" role="button" target="_blank">Twitter</a>
			<?php }
			if ( $author_googleplus != '' ) { ?>
				<a href="<?php $author_googleplus; ?>" class="fl-button btn btn-default btn-sm btn-googleplus" role="button" target="_blank">Google +</a>
			<?php }
			if ( $author_website != '' ) { ?>
				<a href="<?php $author_website; ?>" class="fl-button btn btn-default btn-sm btn-website" role="button" target="_blank">Website</a>
			<?php }	?>
		</div>
	</div>
</div>