<?php
/*
  Template Name: Page with Sidebar
*/
?>

<?php get_header(); ?>
    <div class="container static-page-content">
      <div class="row">

      	<?php get_sidebar(); ?>
        
        <div class="col-md-9">
 
			<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
				
				<div class="page-header">
					<h1><?php the_title(); ?></h1>
				</div>

				<?php the_content(); ?>

			<?php endwhile; else: ?>

				<div class="page-header">
					<h1>Unfortunately ...</h1>
				</div>

				<p>There is no content for this page.</p>

			<?php endif; ?>

        </div>
      
      </div>

<?php get_footer(); ?>