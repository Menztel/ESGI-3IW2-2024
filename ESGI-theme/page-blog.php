<?php
/*
Template Name: Blog
*/
get_header(); ?>
<main id="site-content" class="main-layout">
<div class="blog-content">
    <aside class="sidebar">
        <div class="search-bar">
            <h2>Search</h2>
            <?php get_search_form(); ?>
        </div>

        <div class="recent-posts">
            <h2>Recent posts</h2>
            <?php
            $recent_posts = wp_get_recent_posts(array('numberposts' => 4));
            foreach ($recent_posts as $post) :
            ?>
                <div class="post-item">
                    <a href="<?php echo get_permalink($post['ID']); ?>">
                        <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail'); ?>
                        <h3><?php echo $post['post_title']; ?></h3>
                    </a>
                    <p><?php echo get_the_date('d M, Y', $post['ID']); ?></p>
                </div>
            <?php endforeach; wp_reset_query(); ?>
        </div>

        <div class="archives">
            <h2>Archives</h2>
            <ul>
                <?php wp_get_archives(); ?>
            </ul>
        </div>

        <div class="categories">
            <h2>Categories</h2>
            <ul>
                <?php wp_list_categories(array('title_li' => '')); ?>
            </ul>
        </div>

        <div class="tags">
            <h2>Tags</h2>
            <?php wp_tag_cloud(); ?>
        </div>
    </aside>

    <div class="main-content">
        <div class="posts-grid">
            <?php
            // Query for posts
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'paged' => $paged,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="post">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h2><?php the_title(); ?></h2>
                        </a>
                        <p><?php the_excerpt(); ?></p>
                        <div class="post-meta">
                            <div class="post-categories">
                                <strong>Categories:</strong> <?php the_category(', '); ?>
                            </div>
                            <div class="post-tags">
                                <?php if (get_the_tags()) : ?>
                                    <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>

        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'prev_text' => __('« Previous'),
                'next_text' => __('Next »'),
            ));
            ?>
        </div>
        
        <?php wp_reset_postdata(); ?>
    </div>
</div>
</main>

<?php get_footer(); ?>