<?php
/*
Template Name: Services
*/
get_header(); ?>
<div class="services">
    <h1><?php the_title(); ?>.</h1>
    <?php
        get_template_part('template-parts/services-list');
    ?>
</div>

<?php get_footer(); ?>
