<?php get_header(); ?>

	
			
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



		
		
				<h1><?php the_title(); ?></h1>
			
dfsdff

		
		
		<?php if ( has_post_thumbnail()) : the_post_thumbnail('wplawyer-attorney'); else : endif; ?>
		
						
		
		
		<?php the_content(); ?>
		
		<ul>
		<li><strong>Title: </strong><?php wplawyer_attorney_title(); ?></li>
		<li><strong>Bar: </strong><?php wplawyer_attorney_bar_number(); ?></li>
		<li><?php wplawyer_attorney_address(); ?></li>
		<li><?php wplawyer_attorney_email(); ?></li>
		<li><?php wplawyer_attorney_mobile(); ?></li>
		<li><?php wplawyer_attorney_fax(); ?></li>
		<li><?php wplawyer_attorney_website(); ?></li>
		<li><?php wplawyer_attorney_facebook(); ?></li>
		<li><?php wplawyer_attorney_twitter(); ?></li>
		<li><?php wplawyer_attorney_linkedin(); ?></li>
		<li><?php wplawyer_attorney_youtube(); ?></li>
		</ul>
		
		
		<h3>Areas of Practice</h3>
		<?php echo get_the_term_list( get_the_ID(), 'wplawyer-practice-area', ' ', ', ', '' ); ?>
		
		<h3>Cities of Practice</h3>
		<?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-city', ' ', ', ', '' ); ?>
		
		<h3>Counties of Practice</h3>
		<?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-county', ' ', ', ', '' ); ?>
		
		<h3>Districts</h3>
		<?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-district', ' ', ', ', '' ); ?>
		
		<h3>Law School</h3>
		<?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-lawschool', ' ', ', ', '' ); ?>
		
		<h3>Undergrad School</h3>
		<?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-undergrad', ' ', ', ', '' ); ?>
		

		<?php endwhile; else: ?>

			<p>Sorry, this attorney appears to no longer exist.</p>

		<?php endif; ?>




<?php get_footer(); ?>