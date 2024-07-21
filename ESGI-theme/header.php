<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<header id="site-header">
    <ul>
        <li>
            <a href="#"><?= esgi_getIcon('logo') ?></a>
        </li>
        <li>
            <a href="#"><?= esgi_getIcon('menu') ?></a>
        </li>
        <li>
            <a href="#"><?= esgi_getIcon('closeMenu') ?></a>
        </li>
    </ul>
    <div>
        <?php
        if (has_nav_menu('primary_menu')) {
            wp_nav_menu([
                'menu' => 'primary_menu',
                'container' => 'nav',
                'container_class' => 'main-menu'
            ]);
        }
        ?>
    </div>
</header>