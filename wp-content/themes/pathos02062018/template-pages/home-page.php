<?php
/**
 * The template Name: Home Page
 *
 */

get_header(); ?>


	<?php if ( have_posts() ) {  ?>
		<?php while ( have_posts() ) { the_post(); ?>
	
			<?php the_content(); ?>
			
		<?php } // End of the loop. ?>
	<?php } // End of IF. ?>
		

<?php get_footer();
