<footer id="site-footer" class="site-footer">
    <?php if (is_active_sidebar('bottom-bar')) : ?>
        <div class="bottom-bar bg-primary text-white py-5">
            <div class="container">
                <?php dynamic_sidebar('bottom-bar'); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="footer-widgets pt-5 bg-dark">
        <div class="container">
            <div class="row">
                <?php if ( is_active_sidebar( 'footer-col-1' ) ) : ?>
                    <div class="footer-widget-area col-lg-4 mb-5 mb-lg-0">
                        <?php dynamic_sidebar( 'footer-col-1' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-col-2' ) ) : ?>
                    <div class="footer-widget-area col-lg-4 mb-5 mb-lg-0">
                        <?php dynamic_sidebar( 'footer-col-2' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-col-3' ) ) : ?>
                    <div class="footer-widget-area col-lg-4 mb-5 mb-lg-0">
                        <?php dynamic_sidebar( 'footer-col-3' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
