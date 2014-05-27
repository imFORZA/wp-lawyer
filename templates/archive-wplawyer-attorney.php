<?php get_header(); ?>

			<div class="content">
			
			
			
			<h1>Attorneys</h1>
			
			
			
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="wplawyer-attorney-container">
		
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
			<div class="wplawyer-attorney-thumb">
		
				<?php if ( has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('wplawyer-attorney'); ?>
					<?php else : endif; ?>
					
			</div><!-- end attorney thumbnail -->
			
			<div class="wplawyer-attorney-info">
		
				<ul>
					<li><?php wplawyer_attorney_title(); ?></li>
					<li><?php wplawyer_attorney_bar_number(); ?></li>
					<li><?php wplawyer_attorney_address(); ?></li>
					<li><?php wplawyer_attorney_email(); ?></li>
					<li><?php wplawyer_attorney_mobile(); ?></li>
					<li><?php wplawyer_attorney_fax(); ?></li>
					<li><?php wplawyer_attorney_website(); ?></li>
					<ul class="attorney-social"><?php wplawyer_attorney_facebook_icon(); ?><?php wplawyer_attorney_twitter_icon(); ?><?php wplawyer_attorney_linkedin_icon(); ?><?php wplawyer_attorney_youtube_icon(); ?></ul>
					<li>Areas of Practice: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-practice-area', ' ', ', ', '' ); ?></li>
					<li>Cities of Practice: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-city', ' ', ', ', '' ); ?></li>
					<li>Counties of Practice: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-county', ' ', ', ', '' ); ?></li>
					<li>States of Practice: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-state', ' ', ', ', '' ); ?></li>
					<li>Districts: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-district', ' ', ', ', '' ); ?></li>
					<li>Law School: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-lawschool', ' ', ', ', '' ); ?></li>
					<li>Undergrad School: <?php echo get_the_term_list( get_the_ID(), 'wplawyer-attorney-undergrad', ' ', ', ', '' ); ?></li>
				</ul>
		
				<?php the_content(); ?>
			
			</div><!-- end attorney info -->
		
		</div><!-- end attorney container -->
		
		
		<?php endwhile; else: ?>

				<p>Sorry, this attorney appears to no longer exist.</p>

		<?php endif; ?>
		
		
		
		<!--- ADD PAGINATION LINKS --->
		

	</div>


<?php get_footer(); ?>