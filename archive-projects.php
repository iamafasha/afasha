<?php get_header(  ) ?>       


		<!-- content 
			================================================== -->
            <div id="content">
			<div class="inner-content">
				<div class="portfolio-page">
					<div class="portfolio-box">
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<div class="project-post">
							<div class="view view-first">
                            <?php 
                                $pattern = '/(width="|height=")([0-9]+)\"/i';
                                $x= get_the_post_thumbnail();
                                echo preg_replace($pattern, '', $x);
                            ?>
			                    <div class="mask">
			                    	<div class="top-post">
				                        <h2><?php the_title() ?></h2>
				                        <div class="post-border"></div>
				                        <p><?php the_category( ',', ''); ?></p>
				                    </div>
				                    <div class="bottom-post">
				                    	<a class="zoom" href="<?php the_post_thumbnail_url(); ?>"><i class="fa fa-search"></i></a>
				                    	<a href="<?php the_permalink()?>"><i class="fa fa-arrow-right"></i></a>
				                    </div>
			                    </div>
			                </div>
						</div>
<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- End content -->


<?php get_footer(); ?>