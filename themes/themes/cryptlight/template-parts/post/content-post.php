<?php $sticky_class = is_sticky()?'sticky':''; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
		
		<?php if( has_post_format('audio') || has_post_format('gallery') || has_post_format('video' ) || has_post_thumbnail() ): ?>	
			<div class="post-media">
				<?php 
					if( has_post_format('audio') ){

					 	get_template_part( 'template-parts/parts/audio' );

					}elseif(has_post_format('gallery')){

						get_template_part( 'template-parts/parts/gallery' );

					}elseif(has_post_format('video')){

						get_template_part( 'template-parts/parts/video' );

					}elseif(has_post_thumbnail()){

						get_template_part( 'template-parts/parts/thumbnail' );

			        }
				?>
			</div>
		<?php endif; ?>

		<div class="title-and-category">
		<?php get_template_part( 'template-parts/parts/title' ); ?>
		<div class="category-nhansu">
			<?php
			$categories = get_the_category();
			foreach ( $categories as $category ) { 
				echo ' 
				<div class="sptp-member-profession">
					<h4 class="sptp-jop-title">' . esc_attr( $category->name ) . '</h4>
				</div>
				'; 
			}?>
		</div>
		</div>
		<div class="post-meta">
			<?php get_template_part( 'template-parts/parts/meta' ); ?>
		</div>
		
		<div class="post-content">
			<?php get_template_part( 'template-parts/parts/content' ); ?>
		</div>

		<?php if(has_tag()){ ?>
			<div class="post-tags">
				<?php get_template_part( 'template-parts/parts/tags' ); ?>
			</div>
		<?php } ?>
		
</article>


