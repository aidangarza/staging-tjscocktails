<?php
/*
	Template Name: Page Contact
*/
get_header();
the_post();
?>

<section>
	<div class="container">
		<div class="white-block">
			<?php the_content(); ?>	
			<div class="content-inner">
				<h3 class="post-title"><?php the_title() ?></h3>
				<hr />
				<form id="comment-form" class="comment-form contact-form">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group has-feedback">
								<label for="name"><?php _e( 'Your name', 'recipe' ) ?></label>
								<input type="text" class="form-control name" id="name" name="name" />
							</div>
							<div class="form-group has-feedback">
								<label for="email"><?php _e( 'Your email', 'recipe' ) ?></label>
								<input type="text" class="form-control email" id="email" name="email" />
							</div>
							<div class="form-group has-feedback">
								<label for="subject"><?php _e( 'Message subject', 'recipe' ) ?></label>
								<input type="text" class="form-control subject" id="subject" name="subject" />
							</div>
							<p class="form-submit">
								<a href="javascript:;" class="send-contact btn"><?php _e( 'Send Message', 'recipe' ) ?> </a>
							</p>
							<div class="send_result"></div>							
						</div>
						<div class="col-sm-6">
							<div class="form-group has-feedback">
								<label for="subject"><?php _e( 'Your message', 'recipe' ) ?></label>
								<textarea rows="10" cols="100" class="form-control message" id="message" name="message"></textarea>															
							</div>						
						</div>
					</div>
				</form>	
			</div>					
		</div>
	</div>
</section>
<?php get_footer(); ?>