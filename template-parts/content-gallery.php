                <!-- blog-post -->
                <div class="blog-post gallery-post">
                    <div class="inner-post">
                        <div class="flexslider">
                            <?php if( sunset_get_attachment()): ?>
                            <?php $attachments = sunset_get_bs_slides( sunset_get_attachment(7) ); ?>
                            <ul class="slides">
                                <?php  foreach( $attachments as $attachment ): ?>
                                <li list="<?php echo $attachment['class']; ?>">
                                    <img src="<?php echo $attachment['url']; ?>" />
                                </li>
                                <?php endforeach; ?>
                            </ul>

                            <?php endif; ?>
                        </div>
                        <div class="post-content">
                            <?php get_template_part( 'template-parts/category', '' ); ?>
                            <h2><a href="<?php the_permalink( ) ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <?php get_template_part( 'template-parts/footer', '' ); ?>
                    </div>
                </div>