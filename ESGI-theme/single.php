<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="single-post">
                    <h1><?php the_title(); ?></h1>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="post-meta">
                        <span class="post-category"><?php the_category(', '); ?></span>
                        <span class="post-date"><?php the_date(); ?></span>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="post-tags">
                        <?php if (get_the_tags()) : ?>
                            <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                        <?php endif; ?>
                    </div>
                </article>

                <div class="comments-section">
                    <?php if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif; ?>
                </div>
            <?php endwhile; else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>