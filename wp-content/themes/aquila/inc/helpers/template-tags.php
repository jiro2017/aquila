<?php

function get_the_post_custom_thumbnail( $post_id, $size = 'feature-image', $additional_attributes = array()) {
    $custom_thumbnail = '';

    if(null === $post_id) {
        $post_id = get_the_ID();
    }

    if( has_post_thumbnail( $post_id )) {
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge($additional_attributes, $default_attributes);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $additional_attributes
        );
    }
    return $custom_thumbnail;
}

function the_post_custom_thumbnail( $post_id, $size ='featured-thumbnail', $additional_attributes = array() ) {
    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

function aquila_posted_on() {
    $time_string = "<time class='entry-date published updated' datetime='%1\$s'></time>";
    //if the post is modified, then redefine the time string else use the old time string.
    if(get_the_time('U') !== get_the_modified_time( 'U' )) {
        $time_string = "<time class='entry-date published' datetime='%1\$s'>%2\$s</time> <time class='updated' datetime='%3\$s'>%4\$s</time>";
    }
    $formatted_time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C)),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date ( DATE_W3C )),
        esc_attr( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'aquila'),
        "<a href='".esc_url(get_permalink())."'. rel='bookmark'> $formatted_time_string </a>"
    );

    echo "<span class='posted-one text-secondary'> $posted_on</span>";
}

function aquila_posted_by() {
    $author_url = esc_url( get_author_posts_url(get_the_author_meta( 'ID', esc_html( get_the_author() ))) );
    $author_name = esc_html( get_the_author() );
    if(is_null($author_name)) $author_name = "Anonymous";
    $byline = sprintf(
        esc_html_x('by %s', 'post author', 'aquila'),
        "<span class='author vcard'><a href='".$author_url."'>$author_name</a></span>"
    );
    echo "<span class='byline text-secondary'>$byline</span>";
}

function aquila_the_excerpt( $trim_character_count = 0) {
    if ( $trim_character_count ===0 || !has_excerpt() ) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags( get_the_excerpt() );
    $excerpt = substr( $excerpt, 0, $trim_character_count);
    $excerpt = substr( $excerpt, 0, strrpos($excerpt, ' '));
    // $excerpt_words_array = explode(' ', $excerpt);
    // $excerpt = implode(' ' , array_slice($excerpt_words_array, 0, count($excerpt_words_array) -1));

    echo $excerpt .' [...]';
}

function aquila_excerpt_more($more = '') {
    if( !is_single() ) {
        $more = sprintf( 
            "<button class='mt-4 btn btn-info'><a class='aquila-read-more text-white' href='%1\$s'>%2\$s</a></button>",
            get_permalink( get_the_ID() ),
            __( 'Read More', 'aquila')
         );
    }
    return $more;
}

// function aquila_pagination() {
//     previous_post_link();
//     next_post_link();
// }

function aquila_pagination() {
    $allowed_tags = array(
        'span' => array(
                'class' => []
        ),
        'a' => array(
            'class' => array(),
            'href' => array()
        )
    );

    $args = array(
        'before_page_number' => "<span class='btn border bordr-secondary mr-2 mb-2'>",
        'after_page_number'  => "</span>"
    );

    printf( "<nav class='aquila-pagination clearfix'>%s</nav>", wp_kses( paginate_links($args), $allowed_tags ));
}
?>