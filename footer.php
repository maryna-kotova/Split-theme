        <footer class="footer">
            <div class="footer-container">
                <div class="menu-section">
                    <div class="logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php
                    if ( has_nav_menu( 'menu-footer' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'menu-footer',
                            'container'      => false,
                            'menu_class'     => 'mk-navbar',
                            'debth'          => 1,
                        ) );
                    }
                    ?>
                </div>
                <div class="copyright">
                    <?php
                        if ( function_exists('dynamic_sidebar') ) {
                            dynamic_sidebar('mk_copyright');
                        }
                    ?>
                </div>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>

</body>
</html>