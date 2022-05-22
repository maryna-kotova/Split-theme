<?php get_header(); ?>

<main class="main">
    <section class="hero">
        <div class="container hero__container">
            <section class="variable slider">
                <?php $slider = new WP_Query( array(
			    	'post_type' => 'slider',
			    	'posts_per_page' => -1,
                    'order' => 'ASC',
			    ));

                if ( $slider->have_posts() ) :
                    while ( $slider->have_posts() ) : $slider->the_post();  ?>

                        <div class="slider-content">
                            <div class="slider-text"><?php echo get_the_content(); ?></div>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </section>
        </div>
    </section>
    <section class="articles">
        <h2 class="articles-title"><?php the_field('title_of_articles'); ?></h2>
        <div class="articles-container">
            <?php while ( have_rows( 'tahiti_articles' ) ) : the_row(); ?>
                <article>
                    <div>
                        <img src="<?php echo get_sub_field('article_image_data')['article_img']; ?>"
                             class="article-image"
                             alt="<?php echo get_sub_field('article_image_data')['img_alt']; ?>">
                    </div>
                    <p><?php the_sub_field( 'article_text' ); ?></p>
                    <a href="<?php echo get_sub_field( 'article_link' )['article_url']; ?>" target="_blank">
                        <?php echo get_sub_field( 'article_link' )['link_text']; ?>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="islands">
        <h2 class="islands-title"><?php the_field('title_of_islands'); ?></h2>
        <div class="islands-container">
            <?php $islands = new WP_Query( array(
                'post_type' => 'islands',
                'posts_per_page' => -1,
                'order' => 'ASC',
            ));

            if ( $islands->have_posts() ) :
                while ( $islands->have_posts() ) : $islands->the_post();  ?>

                    <div class="island-content">
                        <figure>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                        </figure>
                        <div>
                            <h3><?php the_title() ?></h3>
                            <p class="island-text"><?php echo get_the_content(); ?></p>
                        </div>
                        <div>
                            <span><?php esc_html_e( 'From', 'split' ); ?></span>
                            <?php the_field('price_island'); ?>
                            <span class="dashicons dashicons-arrow-right-alt"></span>
                        </div>
                    </div>

                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </section>
</main>
        
<?php get_footer();