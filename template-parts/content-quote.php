                <!-- blog-post -->
                <div class="blog-post quote-post">
                    <div class="inner-post">
                        <div class="post-content">
                        <?php $quotes=sunset_grab_quote() ?>

                            <blockquote>
                             <a href="<?php the_permalink(); ?>"> <?php echo $quotes[0]['quote'] ?></a>
                            </blockquote>
                            <span><?php echo $quotes[0]['author'] ?></span>

                           <test> <?php sunset_grab_quote() ?></test>
                        </div>
                    </div>
                </div>