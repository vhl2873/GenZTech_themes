<?php
/**
 * The template for displaying search results pages
 *
 * @package BambooStudy
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container py-5">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        esc_html__('Search Results for: %s', 'bamboo-study'),
                        '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <div class="row">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="card-img-top">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="card-body">
                                <h2 class="card-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="entry-meta text-muted small mb-2">
                                    <span class="posted-on">
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <?php _e('by', 'bamboo-study'); ?> <?php the_author(); ?>
                                    </span>
                                </div>
                                
                                <div class="card-text">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <a href="<?php the_permalink(); ?>" class="btn btn-success btn-sm">
                                    <?php _e('Read More', 'bamboo-study'); ?>
                                </a>
                            </div>
                        </article>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation(array(
                'prev_text' => __('Older posts', 'bamboo-study'),
                'next_text' => __('Newer posts', 'bamboo-study'),
            ));
            ?>

        <?php else : ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing found', 'bamboo-study'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bamboo-study'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
