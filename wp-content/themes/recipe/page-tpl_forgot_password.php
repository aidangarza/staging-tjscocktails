<?php
/*
	Template Name: Forgot Password
*/
if( is_user_logged_in() ){
	wp_redirect( home_url() );
}

get_header();
the_post();

?>

<section>
	<div class="container">
		<div class="white-block">
			<div class="content-inner">
				<h3 class="post-title"><?php _e( 'Forgot password', 'recipe' ) ?></h3>
		
				<form method="post">
					<div class="form-group has-feedback">
					<label for="email"><?php _e( 'Email *', 'recpie' ) ?></label>
						<input type="text" class="form-control" id="email" name="email"/>
					</div>
					<div class="send_result"></div>
					<?php wp_nonce_field('recover','recover_field'); ?>
					<input type="hidden" value="recover" name="action" />
					<p class="form-submit">
						<a href="javascript:;" class="submit-form btn"><?php _e( 'Recover', 'recipe' ) ?> </a>
					</p>
				</form>	
			</div>					
		</div>
	</div>
</section>
<?php get_footer(); ?>