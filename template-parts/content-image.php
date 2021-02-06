                <!-- blog-post -->
                <div class="blog-post photo-post">
                    <div class="inner-post">
                        <div class="view view-first">
                        <?php 
                                $pattern = '/(width="|height=")([0-9]+)\"/i';
                                $x= get_the_post_thumbnail(null,'thumbnail');
                                echo preg_replace($pattern, '', $x);
                            ?>
                            <div class="mask">
                                <div class="i-icons">
                                    <a class="zoom" href="<?php echo the_post_thumbnail_url(); ?>"><i class="fa fa-plus"></i></a>
                                    <a class="zoom" href="<?php echo the_post_thumbnail_url(); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
