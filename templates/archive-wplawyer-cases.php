<style type="text/css">
.case-container {
	width: 33%;
	padding: 20px;
	display: inline-block;
}
</style>

<?php get_header(); ?>

	<div class="content">
	
		<h1>Case Results</h1>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<!-- begin case -->
			<div class="case-container">

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
				
		
			</div><!-- #case -->
			
		<?php endwhile; endif; ?>

	</div><!-- end content -->

<?php get_footer(); ?>