<?php  

class Afasha_Walker_Comment extends Walker_Comment {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1;
        $class= ( $GLOBALS['comment_depth']>0)?"depth":"comment-tree";
        switch ( $args['style'] ) {
            case 'div':
                break;
            case 'ol':
                $output .= '<ol class="'.$class.'">' . "\n";
                case 'ul':
                    $output .= '<ul class="'.$class.'">' . "\n";
                break;
            default:
                $output .= '<ul  class="'.$class.'" >' . "\n";
                break;
        }
    }


    public function end_lvl( &$output, $depth = 0, $args = array() ) { 
        switch ( $args['style'] ) {
            case 'div':
                $output .= "</div><!-- .children -->\n";
                break;
            case 'ol':
                $output .= "</ol><!-- .children -->\n";
                break;
            case 'ul':
            default:
                $output .= "</ul><!-- .children -->\n";
                break;
        }
    }


    protected function comment( $comment, $depth, $args ) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
 
        $commenter          = wp_get_current_commenter();
        $show_pending_links = isset( $commenter['comment_author'] ) && $commenter['comment_author'];
 
        if ( $commenter['comment_author_email'] ) {
            $moderation_note = __( 'Your comment is awaiting moderation.' );
        } else {
            $moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
        }?>

<li>
    <div class="comment-box">

        <?php
            if ( 0 != $args['avatar_size'] ) {
                echo get_avatar( $comment, $args['avatar_size'] );
            }
            ?>
        <img alt="" src="upload/avatar3.jpg">
        <div class="comment-content">
            <h6><?php
            $comment_author = get_comment_author_link( $comment );
 
            if ( '0' == $comment->comment_approved && ! $show_pending_links ) {
                $comment_author = get_comment_author( $comment );
            }
            echo $comment_author;
            ?> <span>/
                    <?php $comment_time = new  MomentPHP\MomentPHP($comment->comment_date_gmt);  echo $comment_time->fromNow()   ?>
                    </span> <?php
            comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']+1,
                        'before'    => '/ <span class="reply">',
                        'after'     => '</span>',
                    )
                )
            );
            ?> <span> <?php edit_comment_link( __( '(Edit)' ), '/ &nbsp;&nbsp;', '' ); ?> </span></h6>
            <p><?php
            comment_text(
            $comment,
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                )
            )
        ); 
        ?>
        
        <?php if ( '0' == $comment->comment_approved ) : ?>
        <em class="comment-awaiting-moderation">(<?php echo $moderation_note; ?>)</em>
        <br />
        <?php endif; ?>
        
        </p>
        </div>
    </div>
</li>
<?php
    }
}