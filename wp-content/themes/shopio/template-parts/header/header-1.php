<header id="masthead" class="site-header header-1" role="banner">
    <div class="header-container">
        <div class="container header-main">
            <div class="header-left">
                <?php
                shopio_site_branding();
                if (shopio_is_woocommerce_activated()) {
                    ?>
                    <div class="site-header-cart header-cart-mobile">
                        <?php shopio_cart_link(); ?>
                    </div>
                    <?php
                }
                ?>
                <?php shopio_mobile_nav_button(); ?>
            </div>
            <div class="header-center">
                <?php shopio_primary_navigation(); ?>
            </div>
            <div class="header-right desktop-hide-down">
                <div class="header-group-action">
                    <?php
                    shopio_header_account();
                    if (shopio_is_woocommerce_activated()) {
                        shopio_header_wishlist();
                        shopio_header_cart();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->
