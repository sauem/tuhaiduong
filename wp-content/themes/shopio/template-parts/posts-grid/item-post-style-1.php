<div class="column-item post-style-1">
    <div class="post-inner">
        <?php
        shopio_post_thumbnail('shopio-post-grid', true);
        ?>
        <div class="entry-content">
            <div class="entry-meta">
                <?php shopio_post_meta(); ?>
            </div>
            <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <div class="more-link-wrap">
                <a class="more-link" href="<?php the_permalink() ?>"><?php echo esc_html__('Read More', 'shopio'); ?><i class="shopio-icon-right-arrow"></i></a>
            </div>
        </div>
    </div>
</div>
