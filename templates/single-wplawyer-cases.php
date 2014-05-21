<?php get_header(); ?>

			<div class="content">
			
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
			
dfsdff

		
		
		<?php if ( has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('wplawyer-case'); ?>
					<?php else : endif; ?>
						
		
		
		<?php the_content(); ?>


		
		
	<?php endwhile; else: ?>

				<p>Sorry, this case appears to no longer exist.</p>

			<?php endif; ?>

	</div>


<?php get_footer(); ?>