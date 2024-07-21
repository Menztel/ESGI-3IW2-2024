<div class="partners">
    <div class="partners-list">
        <?php
        $num_partners = get_theme_mod('num_partners', 6);
        for ($i = 1; $i <= $num_partners; $i++) {
            $partner_logo_setting = 'partner_logo_' . $i;
            $partner_logo = get_theme_mod($partner_logo_setting);
            if ($partner_logo) {
                $file_extension = pathinfo($partner_logo, PATHINFO_EXTENSION);
                echo '<div class="partner">';
                if ($file_extension === 'svg') {
                    echo '<img src="' . esc_url($partner_logo) . '" type="image/svg+xml" alt="Partner Logo ' . $i . '">';
                } else {
                    echo '<img src="' . esc_url($partner_logo) . '" alt="Partner Logo ' . $i . '">';
                }
                echo '</div>';
            }
        }
        ?>
    </div>
</div>