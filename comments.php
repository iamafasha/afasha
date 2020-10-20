<?php 

	if ( post_password_required() ) {
	return;
	}
?>

<div id="comments" class="comment-section">
    <h1><?php comments_number() ?></h1>

	<?php 
		
		$fields = array(
			'cookies'=>'<div class="text-fields" > <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden" value="yes">',
			'author' =>
                '<div class="float-input">
                	<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" />
                	<span><i class="fa fa-user"></i></span>
                </div>',	
			'email' =>
                '<div class="float-input">
                	<input id="email" name="email"  type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" />
                	<span><i class="fa fa-envelope-o"></i></span>
                </div>',
			'url' =>
                '<div class="float-input" >
                    <input id="url" name="url"  type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
                    <span><i class="fa fa-link"></i></span>
                </div></div>',
		);
		
		$args = array(
			
			'class_submit' => 'main-button',
			'label_submit' => 'SEND NOW',
            'comment_field' =>'<div class="submit-area" >
                                <textarea id="comment" name="comment" required="required"></textarea>
								',
			'submit_field'=>'%1$s %2$s </div>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
			
		);
		
		
	?>


<?php if((int)get_comments_number()>10):?>
	<?php comment_form( $args );   ?>
<?php endif; ?>

	<br/>
	<h2>Comments</h2>
	<br/>
    <?php if(have_comments()): ?>



    <ul class="comment-tree">

        <?php
				$args_comments_list = array(
					'walker'			=> new Afasha_Walker_Comment(),
					'max_depth' 		=> '2',
					'style'				=> 'ul',
					'callback'			=> null,
					'end-callback'		=> null,
					'type'				=> 'all',
					'reply_text'		=> 'Reply',
					'page'				=> '',
					'per_page'			=> '',
					'avatar_size'		=> 80,
					'reverse_top_level' => true,
					'reverse_children'	=> '',
					'short_ping'		=> true,
					'echo'				=> true
				);
				
				wp_list_comments( $args_comments_list ); 
				?>
    </ul>


    <?php endif;?>


<?php if((int)get_comments_number()<10||(int)get_comments_number()>30):?>
		
	<?php comment_form( $args );   ?>
<?php endif; ?>
</div>