<?php
/**
 * Template for post entry header
 * 
 * @package Aquila
 */

 $the_post_id = get_the_ID();
 $hide_title = get_post_meta($the_post_id, '_hide_page_title', false);
 $heading_class = !empty($hide_title) && $hide_title=='yes' ? 'hide' : '';
 $has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>
<header class="entry-header">
    <?php
         if( $has_post_thumbnail ) {
            ?>
                <div class="entry-image mb-3">
                    <a href="<?php echo esc_url(get_permalink() ); ?>">
                        <?php
                            the_post_custom_thumbnail(
                                $the_post_id,
                                'featured-large',
                                array(
                                    'sizes' => '(max-width: 350px) 350px, 233px',
                                    'class' => 'attachment-featured-large size-featured-image'
                                )
                            );
                        ?>
                    </a>
                </div>
            <?php
         }
         /**
          * Show the title
          */
          if( is_single() || is_page() ) {
            printf(
                "<h1 class='page-title text-dark %1\$s'>%2\$s</h1>",
                esc_attr( $heading_class ),
                wp_kses_post( get_the_title() )
            );
          } else {
            printf(
                "<h2 class='entry-title mb-3 text-dark'>
                <a href='%1\$s' class='text-dark' style='text-decoration: none'>%2\$s</a>
                </h2>",
                esc_attr( get_the_permalink() ),
                wp_kses_post( get_the_title() )
            );
          }
    ?>
</header>