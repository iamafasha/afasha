<?php get_header() ?>
<!-- content 
			================================================== -->
<div id="content">
    <div class="inner-content">

        <div class="about-page">

            <div class="about-box">
                <?php
				if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<?php the_title( '<h1>','</h1>') ?>
					<?php the_content() ?>
                <?php	endwhile; endif; ?>
            </div>
        </div>

    </div>
</div>
<!-- End content -->

<?php get_footer(  ) ?>