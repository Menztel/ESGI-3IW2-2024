<?php
/*
Template Name: About Us
*/
get_header(); ?>
<main id="site-content">
    <h1><?php the_title(); ?>.</h1>
    <?php
        get_template_part('template-parts/our-Team');
    ?>
</main>
<?php get_footer(); ?>

