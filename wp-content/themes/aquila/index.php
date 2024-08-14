<?php
/**
 * Main Template file
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
                            $index = 0;
                            $no_of_columns = 3;
                            $total_posts = wp_count_posts()->publish;
                            //start loop.
                            while( have_posts() ) : the_post();
                                if($index <= 3) {
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                    <?php
                                            get_template_part('template-parts/pages/content');
                                    ?>
                                        </div>
                                    <?php
                                    $index++;
                                    
                                } else if($index == 3 || $index = $total_posts) {
                                    $index =0;
                                    ?>
                                    </div>
                                    <?php
                                }
                                
                            endwhile;
                            // $index++;
                        ?>
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
            <div class="container">
                <?php aquila_pagination(); ?>
            </div>
            
    </main>
</div>
<?php
get_footer();