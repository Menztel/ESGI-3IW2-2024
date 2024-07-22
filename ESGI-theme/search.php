<?php
get_header();
?>
<div class="search-results">

    <h1 class="title">Search results for: <?php echo get_search_query(); ?></h1>

    <?php
    $s = get_search_query();
    $args = array(
        's' => $s,
        'post_type' => array('post', 'page')
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        $pages = array();
        $posts = array();

        while ($query->have_posts()) : $query->the_post();
            $current_post = get_post();
            if ($current_post instanceof WP_Post) {
                if (get_post_type() == 'page') {
                    if (!empty(get_the_title($current_post))) {
                        $pages[] = $current_post;
                    }
                } else {
                    if (!empty(get_the_title($current_post))) {
                        $posts[] = $current_post;
                    }
                }
            }
        endwhile;

        // Ajout de filtres pour ne récupérer que des instances de l'objet WP_Post
        $pages = array_filter($pages, function($page) {
            return $page instanceof WP_Post;
        });
        $posts = array_filter($posts, function($post) {
            return $post instanceof WP_Post;
        });

        $pages_count = count($pages);
        $posts_count = count($posts);

        if ($pages_count > 0) {
            echo '<h2>Pages : ' . $pages_count . ' page(s) trouvée(s)</h2><ul>';
            foreach ($pages as $page) {
                echo '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            }
            echo '</ul>';
        }
        if ($posts_count > 0) {
            echo '<div class="search-results-grid">';
            foreach ($posts as $post) {
                echo '<div class="search-card">';
                echo '<h3><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h3>';
                echo '<div class="category-date">' . get_the_category_list(', ') . ', ' . get_the_date() . '</div>';
                echo '<div class="excerpt">' . get_the_excerpt() . '</div>';
                echo '</div>';
            }
            echo '</div>';
        }

    endif;
    wp_reset_postdata();
    ?>
</div>
<?php
get_footer();
?>
