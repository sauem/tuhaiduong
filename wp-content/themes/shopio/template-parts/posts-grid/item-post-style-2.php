<div class="column-item post-style-2">
    <div class="post-inner">
        <?php
        shopio_post_thumbnail('shopio-post-grid', true);
        ?>
        <div class="entry-content">
            <div class="entry-meta">
                <?php shopio_post_meta(); ?>
            </div>
            <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
        </div>
    </div>
</div>
