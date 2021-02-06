                <!-- blog-post -->
                <div class="blog-post image-post">
                    <div class="inner-post">
                    <div class="img-container">
                        <?php 
                            $pattern = '/(width="|height=")([0-9]+)\"/i';
                            $x= get_the_post_thumbnail();
                            echo preg_replace($pattern, '', $x);
                        ?>
                       
                    </div>
                        <div class="post-content">
                            <div class="tag"><?php $category = get_the_category();echo $category[0]->cat_name;?></div>
                            <h2><a href="<?php the_permalink(  ) ?>"><?php the_title() ?></a></h2>
                        </div>
                        <?php get_template_part( 'template-parts/footer', '' ); ?>
                    </div>
                </div>