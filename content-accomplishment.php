<article>
	<?php the_post_thumbnail('full', array( 'class' => 'image accomplishment' ) ); ?>
	<div class="inner">
		<h5><?php the_title(); ?></h5>
		<?php the_content(); ?>
	</div>
</article>