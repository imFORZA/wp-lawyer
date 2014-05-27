<?php get_header(); ?>

	
			
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



		
		
				<h1><?php the_title(); ?></h1>	
		
		<?php if ( has_post_thumbnail()) : the_post_thumbnail('wplawyer-attorney'); else : endif; ?>
		
						
		
		
		<?php the_content(); ?>
		
		<ul>
		<li><strong>Title: </strong><?php wplawyer_attorney_title(); ?></li>
		<li><strong>Bar: </strong><?php wplawyer_attorney_bar_number(); ?></li>
		<li><strong>Address: </strong><?php wplawyer_attorney_address(); ?></li>
		<li><strong>Email: </strong><?php wplawyer_attorney_email(); ?></li>
		<li><strong>Phone: </strong><?php wplawyer_attorney_mobile(); ?></li>
		<li><strong>Fax: </strong><?php wplawyer_attorney_fax(); ?></li>
		<li><strong>Website: </strong><?php wplawyer_attorney_website(); ?></li>
		<li><strong>Facebook: </strong><?php wplawyer_attorney_facebook(); ?></li>
		<li><strong>Twitter: </strong><?php wplawyer_attorney_twitter(); ?></li>
		<li><strong>LinkedIn: </strong><?php wplawyer_attorney_linkedin(); ?></li>
		<li><strong>YouTube: </strong><?php wplawyer_attorney_youtube(); ?></li>
		
		<li><strong>Areas of Practice: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-practice-area', ' ', ', ', '' ); ?></li>
		<li><strong>Cities of Practice: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-city', ' ', ', ', '' ); ?></li>
		<li><strong>Counties of Practice: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-county', ' ', ', ', '' ); ?></li>
		<li><strong>States of Practice: </strong><?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-state', ' ', ', ', '' ); ?></li>
		<li><strong>Districts: </strong><?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-district', ' ', ', ', '' ); ?></li>
		<li><strong>Law School: </strong><?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-lawschool', ' ', ', ', '' ); ?></li>
		<li><strong>Undergrad School: </strong><?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-undergrad', ' ', ', ', '' ); ?></li>
		</ul>
		
		

		<?php endwhile; else: ?>

			<p>Sorry, this attorney appears to no longer exist.</p>

		<?php endif; ?>




<?php get_footer(); ?>