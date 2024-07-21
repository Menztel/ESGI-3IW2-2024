<?php
/*
Template Name: Partners
*/
get_header(); ?>
<main id="site-content">
    <h1><?php the_title(); ?>.</h1>
    <?php
        get_template_part('template-parts/partners-list');
    ?>
</main>
<?php get_footer(); ?>



