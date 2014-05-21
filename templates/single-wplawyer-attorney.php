<?php get_header(); ?>

			<div class="content">
			
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
			
dfsdff

		
		
		<?php if ( has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('wplawyer-attorney'); ?>
					<?php else : endif; ?>
						
		
		
		<?php the_content(); ?>
		
		
		<?php wplawyer_attorney_title(); ?>
		<?php wplawyer_attorney_bar_number(); ?>
		<?php wplawyer_attorney_address(); ?>
		<?php wplawyer_attorney_email(); ?>
		<?php wplawyer_attorney_mobile(); ?>
		<?php wplawyer_attorney_fax(); ?>
		<?php wplawyer_attorney_website(); ?>
		<?php wplawyer_attorney_facebook(); ?>
		<?php wplawyer_attorney_twitter(); ?>
		<?php wplawyer_attorney_linkedin(); ?>
		<?php wplawyer_attorney_youtube(); ?>
		
		
	<?php endwhile; else: ?>

				<p>Sorry, this attorney appears to no longer exist.</p>

			<?php endif; ?>

	</div>


<?php get_footer(); ?>