<div class="column-item post-style-custom">
    <div class="post-inner">
        <?php
        shopio_post_thumbnail('shopio-post-custom', false);
        ?>
        <div class="entry-content">
            <h2 style="font-size: 16px" class="text-white"><?php echo wp_trim_words(get_the_title(), 12); ?></h2>
            <p class="text-white"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <div class="more-link-wrap">
                <a class="more-link" href="<?php the_permalink() ?>"><?php echo esc_html__('Tìm hiểu thêm', 'shopio'); ?></a>
            </div>
        </div>
    </div>
</div>
