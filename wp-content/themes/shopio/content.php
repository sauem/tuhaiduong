<article id="post-<?php the_ID(); ?>" <?php post_class('article-default'); ?>>
    <div class="post-inner">
        <?php shopio_post_thumbnail('post-thumbnail',true); ?>
        <div class="post-content">
            <?php
            /**
             * Functions hooked in to shopio_loop_post action.
             *
             * @see shopio_post_header          - 15
             * @see shopio_post_content         - 30
             */
            do_action('shopio_loop_post');
            ?>
        </div>
    </div>
</article><!-- #post-## -->