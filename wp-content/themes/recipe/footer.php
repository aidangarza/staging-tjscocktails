<a href="javascript:;" class="to_top btn">
	<span class="fa fa-angle-up"></span>
</a>

<?php
get_sidebar( 'footer' );
?>

<?php
$copyrights = recipe_get_option( 'copyrights' );
$facebook_link = recipe_get_option( 'copyrights-facebook' );
$twitter_link = recipe_get_option( 'copyrights-twitter' );
$google_link = recipe_get_option( 'copyrights-google' );
$linkedin_link = recipe_get_option( 'copyrights-linkedin' );
$tumblr_link = recipe_get_option( 'copyrights-tumblr' );
if( !empty( $copyrights ) || !empty( $facebook_link ) || !empty( $twitter_link ) || !empty( $google_link ) || !empty( $linkedin_link ) || !empty( $tumblr_link ) ):
?>
	<section class="copyrights">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p><?php
                        $allowed_html = array(
                            'a' => array(
                                'href' => array(),
                                'title' => array()
                            ),
                            'br' => array(),
                            'em' => array(),
                            'strong' => array(),
                        );                  
                        echo wp_kses( $copyrights, $allowed_html );
					?></p>
				</div>
				<div class="col-md-4">
					<p class="text-right">			
						<?php if( !empty( $facebook_link ) ): ?>
						<a href="<?php echo esc_url( $facebook_link ); ?>" class="copyrights-share" target="_blank">
							<i class="fa fa-facebook"></i>
						</a>
						<?php endif; ?>

						<?php if( !empty( $twitter_link ) ): ?>
						<a href="<?php echo esc_url( $twitter_link ); ?>" class="copyrights-share" target="_blank">
							<i class="fa fa-twitter"></i>
						</a>
						<?php endif; ?>

						<?php if( !empty( $google_link ) ): ?>
						<a href="<?php echo esc_url( $google_link ); ?>" class="copyrights-share" target="_blank">
							<i class="fa fa-google-plus"></i>
						</a>
						<?php endif; ?>

						<?php if( !empty( $linkedin_link ) ): ?>
						<a href="<?php echo esc_url( $linkedin_link ); ?>" class="copyrights-share" target="_blank">
							<i class="fa fa-linkedin"></i>
						</a>
						<?php endif; ?>

						<?php if( !empty( $tumblr_link ) ): ?>
						<a href="<?php echo esc_url( $tumblr_link ); ?>" class="copyrights-share" target="_blank">
							<i class="fa fa-tumblr"></i>
						</a>
						<?php endif; ?>				
					</p>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
wp_footer();
?>