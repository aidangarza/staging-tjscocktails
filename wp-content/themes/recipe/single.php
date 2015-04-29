<?php
/*=============================
	DEFAULT SINGLE
=============================*/
get_header();
the_post();

$post_pages = wp_link_pages( 
	array(
		'before' => '',
		'after' => '',
		'link_before'      => '<span>',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'nextpagelink'     => __( '&raquo;', 'recipe' ),
		'previouspagelink' => __( '&laquo;', 'recipe' ),			
		'separator'        => ' ',
		'echo'			   => 0
	) 
);
?>
<section class="single-blog">
	<input type="hidden" name="post-id" value="<?php the_ID() ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="white-block single-item">
					<div class="blog-media">
						<?php $post_format = get_post_format(); ?>
						<?php 
							if( recipe_has_media() ){
								get_template_part( 'media/media', $post_format );
							}
						?>
					</div>
					<div class="content-inner">
						<ul class="list-unstyled list-inline post-meta">
							<li class="single-small-time" title="<?php esc_attr_e( 'Creation time', 'recipe' ) ?>">
								<i class="fa fa-calendar-o"></i><?php the_time( 'F j, Y' ) ?>
							</li>
							<li title="<?php esc_attr_e( 'Number of comments', 'recipe' ) ?>">
								<i class="fa fa-comment-o"></i><?php comments_number( __( '0 comments', 'recipe' ), __( '1 comment', 'recipe' ), __( '% comments', 'recipe' ) ); ?>
							</li>
							<li title="<?php esc_attr_e( 'Author', 'recipe' ) ?>">
								<i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php echo get_the_author_meta('display_name'); ?></a>
							</li>
							<li title="<?php esc_attr_e( 'Post categories', 'recipe' ) ?>">
								<i class="fa fa-folder-open-o"></i> <?php echo recipe_the_category(); ?>
							</li>
							<li title="<?php esc_attr_e( 'Number of likes', 'recipe' ) ?>">
								<i class="fa fa-thumbs-o-up"></i><a href="javascript:;" class="post-like" data-post_id="<?php the_ID(); ?>"><span class="like-count"><?php echo recipe_get_post_extra( 'likes' );?></span></a>
							</li>
							<li title="<?php esc_attr_e( 'Number of views', 'recipe' ) ?>">
								<i class="fa fa-eye"></i> <?php echo recipe_get_post_extra( 'views' );?>
							</li>
						</ul>

						<h3 class="post-title"><?php the_title() ?></h3>
						
						<div class="post-content clearfix">
							<?php the_content(); ?>							
						</div>
						<hr />
						<?php get_template_part( 'includes/share' ) ?>
					</div>
				</div>

				<?php 
				$tags = recipe_the_tags();
				if( !empty( $tags ) ):
				?>
					<div class="post-tags white-block">
						<div class="content-inner">
							<?php _e( '<i class="fa fa-tags"></i> Post tags: ', 'recipe' ); echo $tags; ?>
						</div>
					</div>
				<?php
				endif;
				?>		
				
				<?php if( !empty( $post_pages ) ): ?>
					<div class="pagination">
						<?php echo recipe_link_pages( $post_pages ); ?>
					</div>
				<?php endif; ?>
								
				<?php comments_template( '', true ) ?>

			</div>
			<div class="col-md-3">
				<div class="white-block member-block single-post">
					<div class="member-avatar">
						<?php
						$avatar_url = recipe_get_avatar_url( get_avatar( get_the_author_meta('ID'), 150 ) );
						if( !empty( $avatar_url ) ):
						?>
							<img src="<?php echo esc_url( $avatar_url ) ?>" class="img-responsive" alt="author"/>
						<?php
						endif;
						?>						
					</div>
					<div class="memeber-holder">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="blog-title">
							<h5><?php _e( 'By ', 'recipe' ); echo get_the_author_meta( 'display_name' ); ?></h5>
						</a>
						<ul class="list-unstyled post-meta">
							<li>
								<?php 
									_e( 'Wrote: ', 'recipe' );
									$posts = count_user_posts( get_the_author_meta('ID') , 'post' );
									echo $posts;
									echo $posts == 1 ? _e( ' post', 'recipe' ) : _e( ' posts', 'recipes' );
								?>
							</li>
						</ul>
					</div>
				</div>			

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>