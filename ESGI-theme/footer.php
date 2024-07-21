<footer id="site-footer">
    <div class="box">
           <div>
                <li><?= esgi_getIcon('logo') ?></li>
                <?= date('Y') ?> Figma Template by ESGI
           </div>

            <div>
                <section>
                    <article>
                        <h3>Manager</h3>
                        <p>+33 1 53 31 25 23</p>
                        <p>info@esgi.com</p>
                    </article>
                    <article>
                        <h3>CEO</h3>
                        <p>+33 1 53 31 25 25</p>
                        <p>ceo@company.com</p>
                    </article>
                </section>
        
                <div class="social-links d-flex justify-content-center gap-2">
                <?php
                    $social_networks = ['twitter', 'facebook', 'google', 'linkedin'];
                    foreach ($social_networks as $network) {
                        $url = get_theme_mod('url_' . $network, '');
                        if (!empty($url)) {
                            $image_path = get_template_directory_uri() . '/images/svg/' . $network . '.svg'; // Assurez-vous que le chemin est correct
                            echo '<a href="' . esc_url($url) . '" target="_blank" class="social-link btn btn-outline-secondary"><img src="' . $image_path . '" alt="' . ucfirst($network) . '" style="width: 24px; height: 24px; margin-right: 8px;">' . '</a> ';
                        }
                    }
                    ?>
                </div>
            </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>