                <!-- blog-post -->
                <div class="blog-post image-post">
                    <div class="inner-post">
                    <?php 
                                $pattern = '/(width="|height=")([0-9]+)\"/i';
                                $x= get_the_post_thumbnail();
                                echo preg_replace($pattern, '', $x);
                            ?>
                        <div class="post-content">
                            <h2><a href="<?php the_permalink(  ) ?>"><?php the_title() ?></a></h2>
                            <p><?php the_excerpt(  ) ?></p>
                        </div>
                        <?php get_template_part( 'template-parts/footer', '' ); ?>
                    </div>
                </div>