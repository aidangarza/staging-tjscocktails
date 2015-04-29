<?php
get_header();
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="white-block content-inner error404">
					<h3 class="post-title"><?php _e( 'Page not found', 'recipe' ) ?></h3>
					<hr />
					<div class="post-content">
						<p><?php _e( 'Page you are looking for is no longer available. Use search form bellow to find what you are looking for', 'recipe' ) ?></p>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
?>