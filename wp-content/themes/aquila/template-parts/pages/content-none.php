<?php
/**
 * Content template
 * 
 * @package aquila
 */
?>
<section class="no-result not-found">
                           <h1 class="page-title"><?php esc_html_e('Nothing found', 'aquila'); ?></h1>
                    </section>
                <?php
                 if( is_home() && current_user_can( 'publish_posts')) {
                    ?>
                        <p>
                    <?php
                        printf(
                            wp_kses(
                                __("Ready to publish your first post? <a href='%s'>Get started here</a>", 'aquila'),
                                array(
                                    'a'         => array('href' => [])
                                )
                            ),
                            esc_url( admin_url('post-new.php') )
                            
                        );
                 } else if( is_search() ) {
                    ?>
                    <p><?php esc_html_e('soo but nothing matched your search item. Please try again with some different keyword', 'aquila'); ?></p>
                    <?php
                 } else {
                    ?>
                    <p><?php esc_html_e('it seems taht we cannot find what you are looking for. Perhaps search can help', 'aquila'); ?></p>
                    <?php
                    get_search_form();
                 }
                 ?>