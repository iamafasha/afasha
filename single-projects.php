<?php get_header(); ?>
<!-- content 
			================================================== -->
<div id="content">
    <div class="inner-content">
        <div class="single-project">
            <div class="single-box">
                <div class="single-box-content">
                    <div class="project-post-content">
                        <?php get_template_part( 'template-parts/header', get_post_format() ); ?>
                        <div class="project-text">
                            <h1><?php the_title() ?></h1>
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End content -->

<?php get_footer() ?>