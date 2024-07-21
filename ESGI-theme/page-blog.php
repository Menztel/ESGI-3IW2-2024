<?php
/*
Template Name: Blog
*/
get_header(); ?>
<main id="site-content">
    <h1><?php the_title();?>.</h1>

    <div class="blog-content">
        <div class="search-bar">
            <?php get_search_form(); ?>
        </div>

        <div class="recent-posts">
            <h2>Recent Posts</h2>
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

        <div class="post-categories">
            <h2>Categories</h2>
            <ul>
                <?php wp_list_categories(array('title_li' => '')); ?>
            </ul>
        </div>

        <div class="post-tags">
            <h2>Tags</h2>
            <?php wp_tag_cloud(); ?>
        </div>

        <div class="all-posts">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="post">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h2><?php the_title(); ?></h2>
                        </a>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No posts found.</p>
            <?php endif; ?>

            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>


<?php get_footer(); ?>