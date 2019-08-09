<?php

/**
@ Typeahead search 
*/

function ja_global_enqueues() {
  
  wp_enqueue_style(
    'jquery-auto-complete',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css',
    array(),
    '1.0.7'
  );
  wp_enqueue_script(
    'jquery-auto-complete',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js',
    array( 'jquery' ),
    '1.0.7',
    true
  );
  wp_enqueue_script(
    'global',
    get_template_directory_uri() . '/dist/js/typeahead.js',
    array( 'jquery' ),
    '1.0.0',
    true
  );
  wp_localize_script(
    'global',
    'global',
    array(
      'ajax' => admin_url( 'admin-ajax.php' ),
    )
  );
}
add_action( 'wp_enqueue_scripts', 'ja_global_enqueues' );
/**
 * Live autocomplete search feature.
 *
 * @since 1.0.0
 */
function ja_ajax_search() {
  
  $results = new WP_Query( array(
    'post_type'     => array( 'post'  ),
    'category_name' => 'activation-links',
    'post_status'   => 'publish',
    'nopaging'      => true,
    'posts_per_page'=> -1,
    'order'         => 'DESC',
    's'             => stripslashes( $_POST['search'] ),
  ) );
  $items = array();
  if ( !empty( $results->posts ) ) {
    foreach ( $results->posts as $result ) {
      $items[] = $result->post_title;
    }
  }
  wp_send_json_success( $items );
}
add_action( 'wp_ajax_search_site',        'ja_ajax_search' );
add_action( 'wp_ajax_nopriv_search_site', 'ja_ajax_search' );

/**
@ Set user type session 
*/

// echo wsju_user_type( sanitize_text_field( $_GET["user_type"] );

function wsju_user_type( $user_type ) {

    $user_type = sanitize_text_field( $user_type );

    if( $user_type === 'students' || $user_type === 'professors' ) {

        return $user_type;
    }
}

/*

function wsju_user_type( $user_type ) {

    if ( ! session_id() ) {
        
        session_start();
    }

    if( $user_type === 'students' || $user_type === 'professors' ) {

        $_SESSION['user_type'] = $user_type;
    }
}
add_action( 'init', wsju_user_type( $user_type = sanitize_text_field( $_GET["user_type"] ) ) );
*/

/**
@ Create Link ID
*/

// id="<?php echo wsju_link_id( 'top nav', $linkText ); ?REMOVETHIS>"//
function wsju_link_id( $location, $link_text ) {

    global $post;
    $post_slug = $post->post_name;
    $link_id = $post_slug . '-' . sanitize_title( $location ) . '-' . sanitize_title( $link_text );
    return $link_id;
}

/**
@ Return page slug
*/

function wsju_page_slug() {

    global $post;
    $post_slug = $post->post_name;
    if( $_GET['page_type'] == 'searchresults' ) {
      $post_slug = 'searchresults';
    }
    if( $post_slug == 'search-new' ) {
      $post_slug = 'search';
    }
    if( $post_slug == 'search-a' ) {
      $post_slug = 'search-old';
    }
    if( $post_slug == 'search-b' ) {
      $post_slug = 'search-new';
    }

    return $post_slug;
}

/**
@ Register Rep Post Type
*/

function cptui_register_my_cpts_reps() {

  /**
   * Post Type: Reps.
   */
  
  $labels = array(
    "name" => __( "Reps", "wsj-university-2018" ),
    "singular_name" => __( "Rep", "wsj-university-2018" ),
  );

  $args = array(
    "label" => __( "Reps", "wsj-university-2018" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "reps", "with_front" => true ),
    "query_var" => true,
    "supports" => array( "title", "editor", "thumbnail" ),
    "taxonomies" => array( "category", "post_tag" ),
  );

  register_post_type( "reps", $args );
}

add_action( 'init', 'cptui_register_my_cpts_reps' );

/**
@ Get Reps by State 
*/

// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
  <script type="text/javascript">
  function fetch(){

      jQuery.ajax({
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          type: 'post',
          data: { 
            action: 'data_fetch', 
            rep_type: jQuery('#rep_type').val(), 
            state: jQuery('#state').val(), 
            //state_cat_id: jQuery('#state_cat_id').val()
          },
          success: function(data) {
              jQuery('.form-inner').remove();
              // Todo make this copy editable
              jQuery('.header-text__sub.success-text p').html( 'Please contact the rep below for more information.' );
              jQuery('#datafetch').html( data );



          }
      });
  }
  </script>
<?php }

// the ajax function
add_action( 'wp_ajax_data_fetch' , 'data_fetch' );
add_action( 'wp_ajax_nopriv_data_fetch', 'data_fetch' );
function data_fetch() {
  
  // Get vals from ajax request
  $state        = sanitize_text_field( $_POST['state'] );
  $rep_type     = sanitize_text_field( $_POST['rep_type'] );
  //$state_cat    = sanitize_text_field( $_POST['state_cat_id'] );

  // Correct way
  $state_cat = get_category_by_slug( 'state' );
  $state_cat = $state_cat->term_id;

  $states = array(
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'PR' => 'Puerto Rico',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VI' => 'Virgin Islands',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
        'IT' => 'International',
        'AF' => 'Africa',
        'AS' => 'Asia',
        'EU' => 'Europe',
        'EM' => 'Middle East',
        'SA' => 'South America'
    );
  $rep_types = array( 'professor', 'university' );
  
  // if the values aren't in the arrays...
  if( ! in_array( $state, $states, true ) || ! in_array( $rep_type, $rep_types, true )  ) {

    $error = 1;
    //echo 'error message';
  }

  if ( ! $error ) {
  
    $query = new WP_Query( 
      array( 
        'title'   => $state,
        'cat'   => $state_cat
      )
    );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();

        $reps = get_field( 'rep' );
        foreach( $reps as $rep ) {

          $post = get_post( $rep->ID );
          
          if( in_category( $_POST['rep_type'], $post ) ) {

            echo '<p>' . $post->post_title . ': <a id="' . wsju_link_id( 'rep email', $post->post_content ) . '"  href="mailto:' . antispambot( sanitize_email( $post->post_content ) ) . '">' . antispambot( sanitize_email( $post->post_content ) ) . '</a></p>';
          }
        }
      }
      wp_reset_postdata();
    } 
    else {
      echo 'no results';
    }
  }
  else {

    echo 'Sorry, we encountered an error with your search.';
  }

    die();
}

/**
@ 2017 Scripts
*/
  

  // 2017 Scripts

  function wsju_scripts()
  {
    // Register the script like this for a theme:

    wp_register_style( 'wsj-styles', get_template_directory_uri() . '/dist/css/style.css', array(), $css_version_number );
    wp_enqueue_style( 'wsj-styles' );
    wp_register_style( 'wsj-flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css');
    wp_register_style( 'wsj-flickity-fullscreen', 'https://unpkg.com/flickity-fullscreen@1/fullscreen.css');

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/scripts/vendor/jquery-3.2.1.min.js', array(), null);
    wp_enqueue_script( 'jqueryEase', get_template_directory_uri() . '/scripts/vendor/jquery.easing.1.3.js', array(), null);
    wp_enqueue_script( 'metaQuery', get_template_directory_uri() . '/scripts/vendor/metaquery.min-min.js', array(), null);
    wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/scripts/vendor/modernizr-2.8.3.min.js', array(), null);
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/scripts/vendor/slick.min.js', array(), null);
    wp_enqueue_script( 'wsju-controller', get_template_directory_uri() . '/scripts/WSJU.controller.js', array(), null);
    wp_enqueue_script( 'wsju-main', get_template_directory_uri() . '/scripts/WSJU.main.js', array(), null);
    wp_enqueue_script( 'wsju-nav', get_template_directory_uri() . '/scripts/WSJU.main.nav.js', array(), null);
    wp_enqueue_script( 'wsju-landing', get_template_directory_uri() . '/scripts/WSJU.main.landing.js', array(), null);
    // 2018
    wp_enqueue_script( 'modal-video-js', get_template_directory_uri() . '/dist/js/modal-video.js', $dep, $ver, 1 );
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/dist/js/custom.js', array(), null);

  }

  function SearchFilter($query) {
   // If 's' request variable is set but empty
   if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
      $query->is_search = true;
      $query->is_home = false;
   }
   return $query;
}
add_filter('pre_get_posts','SearchFilter');


  function extend_uploads() {
      $mime_types['xml'] = 'application/xml';

      return $mime_types;
  }

  add_action('wp_enqueue_scripts', 'se_wp_enqueue_scripts');
function se_wp_enqueue_scripts() {
  
    wp_enqueue_script('suggest');
}


add_theme_support( 'title-tag' );

/**
 * Modify the document title for the search page
 */
add_filter( 'document_title_parts', function( $title )
{
    if ( is_search() )
        $title['title'] = sprintf(
            esc_html__( 'testing','WSJU'),
            get_search_query()
        );

    return $title;
} );

add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );

function change_wp_search_size($queryVars) {
    if ( isset($_REQUEST['s']) ) // Make sure it is a search page
        $queryVars['posts_per_page'] = 5; // Change 10 to the number of posts you would like to show
    return $queryVars; // Return our modified query variables
}
add_filter('request', 'change_wp_search_size'); // Hook our custom function onto the request filter



  add_action( 'wp_enqueue_scripts', 'wsju_scripts' );



?>