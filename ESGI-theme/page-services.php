<?php
/*
Template Name: Services
*/
get_header(); ?>
<main id="site-content">
    <div class="services">
        <h1><?php the_title(); ?>.</h1>
        <?php
            get_template_part('template-parts/services-list');
        ?>
    </div>
</main>

<?php get_footer(); ?>
