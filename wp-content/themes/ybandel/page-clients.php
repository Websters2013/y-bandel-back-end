<?php
/**
 * Template Name: Clients Page
 */
get_header(); ?>

    <!-- site__content -->
    <div class="site__content">

        <!-- clients -->
        <div class="clients">

            <!-- site__page -->
            <span class="site__page">04</span>
            <!-- /site__page -->

            <!-- site__title -->
            <h1 class="site__title"><?php the_title();?></h1>
            <!-- /site__title -->

            <!-- clients__founder -->
            <div class="clients__founder">

                <img src="<?php echo TEMPLATEURI; ?>/dist/pic/clients__pic.jpg" alt="clients">

                <!-- clients__founder-title -->
                <strong class="clients__founder-title"><?php the_field('main_text_on_page'); ?></strong>
                <!-- /clients__founder-title -->

             <?php the_field('description_text'); ?>

            </div>
            <!-- /clients__founder -->

            <!-- clients__list -->
            <div class="clients__list">

                <?php
                $tmp = $post;

                $posts = get_posts( array(
                        'post_type'  => 'clients',
                        'posts_per_page' => -1,
                    )
                );

                $count = 0;
                foreach($posts as $post){setup_postdata($post);
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id,'full')[0];
                    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    $attachment = get_post( $thumb_id );
                    $title = $attachment->post_title; ?>

                    <!-- clients__item -->
                    <div class="clients__item"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $alt; ?>" title="<?= $title; ?>"></div>
                    <!-- /clients__item -->

                <?php $count++; } ?>

            </div>
            <!-- /clients__list -->

        </div>
        <!-- /clients -->

    </div>
    <!-- /site__content -->


<?php get_footer(); ?>