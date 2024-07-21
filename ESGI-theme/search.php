<?php
get_header();
?>
<div class="search-results">
    <h1>Résultats de la recherche pour <?php echo get_search_query(); ?></h1>

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
            echo '<h2>Articles : ' . $posts_count . ' article(s) trouvé(s)</h2><ul>';
            foreach ($posts as $post) {
                echo '<li><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></li>';
            }
            echo '</ul>';
        }

        if ($pages_count > 0 && $posts_count == 0) {
            echo '<p>Seules des pages ont été trouvées.</p>';
        }
        if ($pages_count == 0 && $posts_count > 0) {
            echo '<p>Seuls des articles ont été trouvés.</p>';
        }
        if ($pages_count == 0 && $posts_count == 0) {
            echo '<p>Aucun article ou page trouvé pour votre recherche.</p>';
        }
    endif;
    wp_reset_postdata();
    ?>
</div>
<?php
get_footer();
?>
