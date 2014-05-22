<style type="text/css">
.case-thumb {
	margin: 0 20px 0 0;
	float: left;
}
.case-information {
	margin: 0 20px;
	float: left;
}
.clear {
	clear: both;
}
</style>

<?php get_header(); ?>

	<div class="content">
			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
		<h1><?php the_title(); ?></h1>
		
		<div class="case-thumb">
		
		<?php if ( has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('wplawyer-case'); ?>
					<?php else : endif; ?>
					
		</div>
		
		<div class="case-information">
		
			<!-- case type -->
			<h3 class="case-type"><?php echo get_the_term_list( get_the_ID(), 'wplawyer-case-type', ' ', ', ', '' ); ?></h3>
			<!-- #case type -->
				
			<!-- case plaintiff v. defendent -->
			<p class="case-parties"><?php wplawyer_case_plantiff(); ?>&nbsp;v.&nbsp;<?php wplawyer_case_defendent(); ?></p>
			<!-- #case plaintiff v. defendent -->
				
			<!-- case verdict price -->
			<p class="case-verdict-price"><?php wplawyer_case_verdict_price(); ?></h3>
			<!-- #case verdict price -->
				
			<!-- case resolution i.e. settlement, jury verdict, etc -->
			<p class="case-resolution"><?php echo get_the_term_list( get_the_ID(), 'wplawyer-case-resolution', ' ', ', ', '' ); ?></h5>
			<!-- #case resolution -->
				
			<!-- court house -->
			<p class="case-court-house"><?php echo get_the_term_list( get_the_ID(), 'wplawyer-cases-courthouse', ' ', ', ', '' ); ?></p>
			<!-- #court house -->
		
		</div>
		
		<div class="clear"></div>
		
		<?php the_content(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, this case appears to no longer exist.</p>

	<?php endif; ?>

	</div>


<?php get_footer(); ?>