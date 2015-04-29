<?php
$enable_share = recipe_get_option( 'enable_share' );

if( $enable_share == 'yes' ):
$facebook_share = recipe_get_option( 'facebook_share' );
$twitter_share = recipe_get_option( 'twitter_share' );
$google_share = recipe_get_option( 'google_share' );
$linkedin_share = recipe_get_option( 'linkedin_share' );
$tumblr_share = recipe_get_option( 'tumblr_share' );
?>
	<div class="post-share">
		<?php if( $facebook_share == 'yes' ): ?>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( get_permalink() ); ?>" class="share facebook" target="_blank" title="<?php esc_attr_e( 'Share on Facebook', 'recipe' ); ?>"><i class="fa fa-facebook fa-fw"></i></a>
		<?php endif; ?>
		<?php if( $twitter_share == 'yes' ): ?>
			<a href="http://twitter.com/intent/tweet?source=<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>&amp;text=<?php echo rawurlencode( get_permalink() ); ?>" class="share twitter" target="_blank" title="<?php esc_attr_e( 'Share on Twitter', 'recipe' ); ?>"><i class="fa fa-twitter fa-fw"></i></a>
		<?php endif; ?>
		<?php if( $google_share == 'yes' ): ?>
			<a href="https://plus.google.com/share?url=<?php echo rawurlencode( get_permalink() ); ?>" class="share google" target="_blank" title="<?php esc_attr_e( 'Share on Google+', 'recipe' ); ?>"><i class="fa fa-google fa-fw"></i></a>
		<?php endif; ?>
		<?php if( $linkedin_share == 'yes' ): ?>
			<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( get_permalink() ); ?>&amp;title=<?php echo rawurlencode( get_the_title() ); ?>&amp;summary=<?php echo rawurlencode( get_the_excerpt() ); ?>&amp;source=<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="share linkedin" target="_blank" title="<?php esc_attr_e( 'Share on LinkedIn', 'recipe' ); ?>"><i class="fa fa-linkedin fa-fw"></i></a>		<?php endif; ?>
		<?php if( $tumblr_share == 'yes' ): ?>
			<a href="http://www.tumblr.com/share/link?url=<?php echo rawurlencode( get_permalink() ); ?>&amp;name=<?php echo rawurlencode( get_the_title() ); ?>&amp;description=<?php echo rawurlencode( get_the_excerpt() ); ?>" class="share tumblr" target="_blank" title="<?php esc_attr_e( 'Share on Tumblr', 'recipe' ); ?>"><i class="fa fa-tumblr fa-fw"></i></a>
		<?php endif; ?>
	</div>
<?php endif; ?>