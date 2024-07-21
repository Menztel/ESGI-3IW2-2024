<div class="our-team">

    <h1 class="our-team-title">Our Team</h1>

    <div class="team-section">
    <h2>Our Team</h2>
    <div class="team-members">
        <?php
        $number_of_team_members = get_theme_mod('number_of_team_members', 4);

        for ($i = 1; $i <= $number_of_team_members; $i++) {
            $name = get_theme_mod("team_member_{$i}_name", '');
            $role = get_theme_mod("team_member_{$i}_role", '');
            $phone = get_theme_mod("team_member_{$i}_phone", '');
            $email = get_theme_mod("team_member_{$i}_email", '');
            $photo = get_theme_mod("team_member_{$i}_photo", '');

            if ($name) : ?>
                <div class="team-member">
                    <?php if ($photo) : ?>
                        <div class="team-member-photo">
                            <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($name); ?>">
                        </div>
                    <?php endif; ?>
                    <h3><?php echo esc_html($name); ?></h3>
                    <p><?php echo esc_html($role); ?></p>
                    <p><?php echo esc_html($phone); ?></p>
                    <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                </div>
            <?php endif;
        } ?>
    </div>
</div>

</div>