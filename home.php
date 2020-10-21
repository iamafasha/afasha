<? get_header()  ?>
<!-- content 
            ================================================== -->
<div id="content">
    <div class="inner-content">
        <div class="blog-page">
            <?php  previous_posts_link("Newer Posts") ?>
            <div class="blog-box">
                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                <?php endwhile; ?>
                <?php else : ?>
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif; ?>
            </div>
            <?php  next_posts_link("Older Posts") ?>
        </div>
    </div>
</div>

<!-- End content -->

<? get_footer()  ?>