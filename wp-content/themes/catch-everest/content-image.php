<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package Catch Themes
 * @subpackage Catch Everest
 * @since Catch Everest 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-container post-format">
    
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'catch-everest' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <h2 class="entry-format"><a href="<?php echo get_post_format_link( 'Image' ); ?>" title="<?php _e( 'All Image Posts', 'catch-everest' ); ?>"><?php _e( 'Image', 'catch-everest' ); ?></a></h2>
        </header><!-- .entry-header -->  
    	
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
		<?php else : ?>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'catch-everest' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'catch-everest' ), 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->
        <?php endif; ?>

        <footer class="entry-meta">
            <?php catcheverest_post_format_meta(); ?>   
            <?php if ( comments_open() ) : ?>
            	<span class="sep"> | </span>
            	<span class="comments-link"><?php comments_popup_link(__('Leave a reply', 'catch-everest'), __('1 Reply', 'catch-everest'), __('% Replies;', 'catch-everest')); ?></span>
            <?php endif; ?>
            <?php edit_post_link( __( 'Edit', 'catch-everest' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
        
  	</div><!-- .entry-container -->
    
</article><!-- #post-<?php the_ID(); ?> -->