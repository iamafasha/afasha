                <!-- blog-post -->
                <div class="blog-post aside-post">
                    <div class="inner-post">
                        <div class="post-content">
                            <h2><?php $content=get_the_excerpt(); echo strlen($content) > 150 ? substr($content,0,150) : $content; ?>....</h2>
                            <a href="<?php the_permalink() ?>">Continue Reading</a>
                        </div>
                    </div>
                </div>