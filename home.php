<?php get_header()  ?>
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
      
        </div>
        <div class="pagination">
            <div class="pagination-wrapper">
                <?php  previous_posts_link(' <i class="fa fa-arrow-left" title="Newer Page" aria-hidden="true"></i>') ?>
                <?php  next_posts_link('<i class="fa fa-arrow-right" aria-hidden="true"></i>') ?>   
            </div>
       </div>
<!-- 
        <div class="posts-loader w-100">
            <div class="loader-container ">
                <span id="more-posts-loader" class="loader"  style="padding-right:5px"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i></span>
                <span>Loading</span>
            </div>
        </div>
 -->
    </div>
</div>

<!-- End content -->

<?php get_footer()  ?>