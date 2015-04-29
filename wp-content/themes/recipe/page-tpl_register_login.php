<?php
/*
	Template Name: Register & Login
*/
session_start();
if( is_user_logged_in() ){
	wp_redirect( home_url() );
}

$user_confirmed = false;
if( isset( $_GET['confirmation_hash'] ) && isset( $_GET['username'] ) ){
	$confirmation_hash = esc_sql( $_GET['confirmation_hash'] );
	$username = esc_sql( $_GET['username'] );
	$user = get_user_by( 'login', $username );
	if( $user ){
		$confirmation_hash_db = get_user_meta( $user->ID, 'confirmation_hash', true );
		if( $confirmation_hash_db == $confirmation_hash ){
			update_user_meta( $user->ID, 'user_active_status', 'active' );
			delete_user_meta( $user->ID, 'confirmation_hash' );
			$user_confirmed = true;
		}
	}
}
get_header();
the_post();

?>

<section>
	<div class="container">
		<div class="white-block">
			<div class="content-inner">
				<div class="row">

					<?php
					if( $user_confirmed ){
						?>
						<div class="alert alert-success">
							<?php _e( 'You have successfully confirmed your email address and now you can log in.', 'recipe' ) ?>
						</div>
						<?php
					}
					?>

					<?php if(get_option('users_can_register')): ?>
						<div class="col-sm-6">
							<h3 class="post-title"><?php _e( 'Register', 'recipe' ) ?></h3>
					
							<form method="post" action="<?php echo recipe_get_permalink_by_tpl( 'page-tpl_register_login' ); ?>">
								<div class="form-group has-feedback">
									<label for="username"><?php _e( 'Username *', 'recpie' ) ?></label>
									<input type="text" class="form-control" id="username" name="username"/>
								</div>
								<div class="form-group has-feedback">
								<label for="email"><?php _e( 'Email *', 'recpie' ) ?></label>
									<input type="text" class="form-control" id="email" name="email"/>
								</div>
								<div class="form-group has-feedback">
									<label for="password"><?php _e( 'Password *', 'recpie' ) ?></label>
									<input type="password" class="form-control" id="password" name="password"/>
								</div>
								<div class="form-group has-feedback">
									<label for="repeat_password"><?php _e( 'Repeat Password *', 'recpie' ) ?></label>
									<input type="password" class="form-control" id="repeat_password" name="repeat_password"  />
								</div>
								<div class="form-group has-feedback">
									<label for="captcha"><?php _e( 'Captcha *', 'recpie' ) ?> <span class="captcha-solve"><?php echo coupon_captcha(); ?></span></label>
									<input type="captcha" class="form-control" id="captcha" name="captcha"  />
								</div>								
								<div class="send_result"></div>
								<?php wp_nonce_field('register','register_field'); ?>
								<input type="hidden" value="register" name="action" />
								<p class="form-submit clearfix register-actions">
									<a href="javascript:;" class="submit-form btn"><?php _e( 'Register', 'recipe' ) ?> </a>									
								</p>
	                            <?php
	                            if( function_exists( 'sc_render_login_form_social_connect' ) ){
	                                sc_render_login_form_social_connect();
	                            }
	                            ?>
							</form>						
						</div>
					<?php endif; ?>
					<div class="col-sm-6">
						<h3 class="post-title"><?php _e( 'Login', 'recipe' ) ?></h3>
				
						<form method="post" action="<?php echo recipe_get_permalink_by_tpl( 'page-tpl_register_login' ); ?>">
							<div class="form-group has-feedback">
								<label for="username"><?php _e( 'Username *', 'recpie' ) ?></label>
								<input type="text" class="form-control" id="username" name="username"/>
							</div>
							<div class="form-group has-feedback">
								<label for="password"><?php _e( 'Password *', 'recpie' ) ?></label>
								<input type="password" class="form-control" id="password" name="password"/>
							</div>
							<div class="form-group has-feedback clearfix">
								<div class="pull-left">
									<input type="checkbox" id="remember_me" name="remember_me"/>
									<label for="remember_me"><?php _e( 'Remember Me', 'recipe' ) ?></label>
								</div>
								<div class="pull-right">
									<a href="<?php echo recipe_get_permalink_by_tpl( 'page-tpl_forgot_password' ) ?>">
										<?php _e( 'Lost Password?', 'recipe' ); ?>
									</a>
								</div>
							</div>
							<div class="send_result"></div>
							<?php wp_nonce_field('login','login_field'); ?>
							<input type="hidden" value="login" name="action" />
							<p class="form-submit">
								<a href="javascript:;" class="submit-form btn"><?php _e( 'Log In', 'recipe' ) ?> </a>
							</p>
						</form>						
					</div>
				</div>
			</div>					
		</div>
	</div>
</section>
<?php get_footer(); ?>