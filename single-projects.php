<?php get_header(); ?>
<!-- content 
			================================================== -->
<div id="content">
    <div class="inner-content">
        <div class="single-project">
            <div class="single-box">
                <div class="single-box-content">
                    <div class="container project-post-content">
                        <div class="project-text">
                            <h1><?php the_title() ?></h1>
                            <?php the_content() ?>


                            <?php if ( comments_open() ): ?>
                            <span><i class="fa fa-comment"></i><a href="#"><?php  comments_number(  ); ?></a></span>
                            <?php endif;   ?>


                        </div>

                        <?php 
						    if ( comments_open() ):
							comments_template();
							endif; 
						?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End content -->

<?php get_footer() ?>