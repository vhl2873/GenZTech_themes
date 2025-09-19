<?php
/**
 * The template for displaying all single posts
 *
 * @package BambooStudy
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container py-5">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    <div class="entry-meta">
                        <span class="posted-on">
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline">
                            <?php _e('by', 'bamboo-study'); ?> <?php the_author(); ?>
                        </span>
                    </div>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'bamboo-study'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $categories_list = get_the_category_list(__(', ', 'bamboo-study'));
                    if ($categories_list) {
                        printf('<span class="cat-links">' . __('Posted in %1$s', 'bamboo-study') . '</span>', $categories_list);
                    }

                    $tags_list = get_the_tag_list('', __(', ', 'bamboo-study'));
                    if ($tags_list) {
                        printf('<span class="tags-links">' . __('Tagged %1$s', 'bamboo-study') . '</span>', $tags_list);
                    }
                    ?>
                </footer>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
