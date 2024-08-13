<?php
/**
 * Single post template
 * 
 * @package Aquila
 */
get_header();
?>
<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php
            if(have_posts() ) {
                ?>
                    <div class="container">
                        <?php
                            if( is_home() && !is_front_page()) {
                                ?>
                                    <header class="mb-5">
                                        <h1 class="h1 page-title ">
                                            <?php single_post_title(); ?>
                                        </h1>
                                        <h1 class="h1 page-title screen-reader-text">
                                            <?php single_post_title(); ?>
                                        </h1>
                                    </header>
                                <?php

                            }
                        ?>

                        <div class="row">
                            <?php 
                                while ( have_posts() ) : the_post();
                                    get_template_part('template-parts/pages/content');
                                endwhile;
                            ?>
                        </div>
                    </div>
</div>
                <?php
            } else { 
                    get_template_part('template-parts/pages/content-none')
                ?>
                <?php
            }
            // get_template_part('template-parts/pages/content-none');
        ?> 
    </main>
</div>
<?php
get_footer();