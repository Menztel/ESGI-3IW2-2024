<footer id="site-footer" class="col-md-6 offset-3">
    <div class="container">
        <div class="social-links d-flex justify-content-center gap-2">
            <?php
            $social_networks = ['twitter', 'facebook', 'google', 'linkedin'];
            foreach ($social_networks as $network) {
                $url = get_theme_mod('url_' . $network, '');
                if (!empty($url)) {
                    echo '<a href="' . esc_url($url) . '" target="_blank" class="social-link btn btn-outline-secondary">' . ucfirst($network) . '</a> ';
                }
            }
            ?>
        </div>
        ©<?= date('Y') ?> Maheanuu Allain
        <?php if (get_theme_mod('has_footer_search', 'false') == 'true') : ?>
            <div class="footer-search">
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>