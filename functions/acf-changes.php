<?php
function my_acf_post_object_result( $text, $post, $field ) {
    // Only modify the display for the "testimonials" field.
    if( $field['name'] === 'testimonials' ) {
        // Retrieve the "case_study" relationship field (it may return an array or a single object).
        $case_studies = get_field('case_study', $post->ID);
        $case_study_titles = '';

        if ( $case_studies ) {
            if ( is_array( $case_studies ) ) {
                $titles = array();
                foreach( $case_studies as $cs ) {
                    $titles[] = get_the_title( $cs->ID );
                }
                $case_study_titles = implode( ', ', $titles );
            } else {
                $case_study_titles = get_the_title( $case_studies->ID );
            }
        }

        // Get a thumbnail for the testimonial post.
        $thumb = get_the_post_thumbnail( $post->ID, array(50,50) );
        // Build a custom display string.
        $text = $thumb . ' ' . get_the_title( $post->ID );
        if ( $case_study_titles ) {
            $text .= ' - ' . $case_study_titles;
        }
    }
    return $text;
}
add_filter('acf/fields/post_object/result', 'my_acf_post_object_result', 10, 3);

if ( function_exists('acf_add_options_page') ) {
  acf_add_options_page([
    'menu_title'  => 'Edit Layout',
    'menu_slug'   => 'case-studies-archive',
    'capability'  => 'edit_posts',
    'redirect'    => false,
    'icon_url'    => 'dashicons-align-left',
    'position'    => 2, 
    'parent_slug' => 'edit.php?post_type=casestudy',
  ]);
}

/**
 * Print our float‐and‐height CSS+JS both in the ACF admin UI
 * and on the front‐end Archive Preview page.
 */
function ei_archive_items_admin_preview_scripts() {
  // Only fire in admin, or on the front end when using the "page-archive-preview.php" template
  if ( is_admin() || is_page_template('page-archive-preview.php') ) :

    // 1) CSS: float two‐up, fixed height, full‐width override
    echo '<style>
      /* clearfix container */
      .acf-field[data-name="archive_items"] .acf-flexible-content:after {
        content:""; display:table; clear:both;
      }
      /* default two‐up panels */
      .acf-field[data-name="archive_items"] .acf-flexible-content .layout {
        height: 140px;
        float: left;
        width: 48%;
        margin: 0% 1% 2% 1%;
        box-sizing: border-box;
      }
      /* full‐width when .full is added */
      .acf-field[data-name="archive_items"] .acf-flexible-content .layout.full {
        float: none !important;
        width: 98% !important;
        margin: 0% 1% 2% 1% !important;
        clear: both;
      }
    </style>';

    // 2) JS: watch quote_size → toggle .full
    echo '<script>
      (function($){
        function reflow(){
          $(".acf-field[data-name=\'archive_items\'] .acf-flexible-content .layout").each(function(){
            var $L = $(this),
                isFull = false;
            if( $L.data("layout") === "testimonial" ) {
              var size = $L.find("[data-name=\'quote_size\'] select").val();
              if( size === "large" ) isFull = true;
            }
            $L.toggleClass("full", isFull);
          });
        }
        // admin: ACF hooks
        if(window.acf){
          acf.add_action("ready",  reflow);
          acf.add_action("append", reflow);
        }
        // front‐end: when the form is injected, run on DOM ready
        $(document).ready(reflow);
        // and watch for changes in the quote_size select
        $(document).on("change","[data-name=\'quote_size\'] select",reflow);
      })(jQuery);
    </script>';

  endif;
}
add_action('acf/input/admin_head',    'ei_archive_items_admin_preview_scripts');
add_action('wp_head',                'ei_archive_items_admin_preview_scripts');