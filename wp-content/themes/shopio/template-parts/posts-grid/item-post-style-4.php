<div class="column-item post-style-4">
    <div class="post-inner">
        <?php
        shopio_post_thumbnail('shopio-post-grid', false);
        ?>
        <div class="entry-content">
            <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
            <div class="entry-meta">
                <?php
                $categories_list = get_the_category_list(' ');
                if ('post' === get_post_type() && $categories_list) {
                    // Make sure there's more than one category before displaying.
                    echo '<div class="categories-link"><span class="screen-reader-text">' . esc_html__('Categories', 'shopio') . '</span>' . $categories_list . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
