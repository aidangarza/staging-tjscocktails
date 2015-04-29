<?php
/*=============================
	DEFAULT PAGE
=============================*/
get_header();
the_post();
?>

<section class="main-listing">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="white-block">
					<?php if( has_post_thumbnail() ): ?>
						<div class="embed-responsive embed-responsive-16by9">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'embed-responsive-item' ) ); ?>
						</div>
					<?php endif; ?>
					<div class="content-inner">
						<h3 class="post-title"><?php the_title() ?></h3>
						<hr />
						<div class="post-content">
							<?php the_content(); ?>
							<div class="clearfix"></div>
						</div>
						
					</div>
				</div>
				
				<?php comments_template( '', true ) ?>
				
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>