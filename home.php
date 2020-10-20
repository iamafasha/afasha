<? get_header()  ?>
<!-- content 
			================================================== -->
<div id="content">
    <div class="inner-content">
        <div class="blog-page">
            <div class="blog-box">

                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                <?php endwhile; ?>
                <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif; ?>

            </div>
            <a class="blog-page-link" href="#">Older Posts</a>
        </div>
    </div>
</div>
<!-- End content -->

<? get_footer()  ?>