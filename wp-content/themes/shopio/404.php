<?php
get_header(); ?>

    <div id="primary" class="content">
        <main id="main" class="site-main">
            <div class="error-404 not-found">
                <div class="page-content">
                    <header class="page-header">
                        <h1 class="title"><?php esc_html_e('404','shopio');?></h1>
                        <h3 class="sub-title"><?php esc_html_e('Oops, that links is broken.', 'shopio'); ?></h3>
                    </header><!-- .page-header -->
                    <div class="error-img404">
                        <img src="<?php echo get_theme_file_uri('assets/images/404/404.png') ?>" alt="<?php echo esc_attr__('404 Page', 'shopio'); ?>">
                    </div>
                    <div class="error-text">
                        <span><?php esc_html_e('Page doesn’t exist or some other error occured. Go to our ', 'shopio') ?><a href="<?php echo esc_url(home_url('/')); ?>" class="return-home"><?php esc_html_e('Home page', 'shopio'); ?></a></span>
                    </div>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="button-404">
                        <span class="button-text"><?php esc_html_e('Back To Home', 'shopio'); ?></span>
                    </a>
                </div><!-- .page-content -->
            </div><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #primary -->
<?php

get_footer();
