                <!-- blog-post -->
                <div class="blog-post video-post">
                    <div class="inner-post">
                        <!-- youtube -->
                        <?php echo afasha_get_embedded_media( array('video','iframe') ); ?>
                        <!-- End youtube -->
                        <div class="post-content">
                            <h2><a href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt() ?></p>
                        </div>
                        <?php get_template_part( 'template-parts/footer', '' ); ?>
                    </div>
                </div>